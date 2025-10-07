<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\LoanStatus;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return Loan::with(['user', 'book'])->paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validated();

        $loan = DB::transaction(function () use ($data) {
            $book = Book::lockForUpdate()->findOrFail($data['book_id']);
            if ($book->stock < 1) {
                abort(422, 'Sin stock disponible');
            }
            $book->decrement('stock', 1);

            $data['loan_date'] = $data['loan_date'] ?? now();
            $data['status'] = LoanStatus::PENDING;

            return Loan::create($data)->load(['user', 'book']);
        });

        return response()->json($loan, 201);
    }

    public function show(Loan $loan)
    {
        return $loan->load(['user', 'book']);
    }

    public function update(Request $request, Loan $loan)
    {
        $loan->update($request->validated());
        return response()->json($loan->load(['user', 'book']));
    }

    public function destroy(Loan $loan)
    {
        if ($loan->status !== LoanStatus::DELIVERED) {
            $loan->book()->update(['stock' => DB::raw('stock + 1')]);
        }
        $loan->delete();
        return response()->noContent();
    }

    public function return(Loan $loan)
    {
        if ($loan->status === LoanStatus::DELIVERED) {
            return response()->json($loan->load(['user', 'book']));
        }
        DB::transaction(function () use ($loan) {
            $loan->update([
                'status' => LoanStatus::DELIVERED,
                'delivery_date' => now()->toDateString(),
            ]);
            $loan->book()->update(['stock' => DB::raw('stock + 1')]);
        });
        return response()->json($loan->fresh()->load(['user', 'book']));
    }
}
