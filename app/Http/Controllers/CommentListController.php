<?php

namespace App\Http\Controllers;

use App\Models\CommentList;
use Illuminate\Http\Request;

class CommentListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentLists = CommentList::with(['job', 'comment'])->paginate(10);
        return view('comment-lists.index', compact('commentLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment-lists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            'salary' => ['nullable', 'string'],
            'job_id' => ['required', 'exists:jobs_listing,id'],
            'comment_id' => ['required', 'exists:comments,id']
        ]);

        CommentList::create($request->all());

        return redirect()->route('comment-lists.index')->with('success', 'Comment List created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommentList $commentList)
    {
        return view('comment-lists.show', compact('commentList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommentList $commentList)
    {
        return view('comment-lists.edit', compact('commentList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommentList $commentList)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            'salary' => ['nullable', 'string'],
            'job_id' => ['required', 'exists:jobs_listing,id'],
            'comment_id' => ['required', 'exists:comments,id']
        ]);

        $commentList->update($request->all());

        return redirect()->route('comment-lists.show', $commentList)->with('success', 'Comment List updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommentList $commentList)
    {
        $commentList->delete();

        return redirect()->route('comment-lists.index')->with('success', 'Comment List deleted successfully!');
    }
}
