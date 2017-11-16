<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\CommentRequest;
use App\Repositories\CommentsRepository;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\CommentCollection;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentsRepository $commentsRepository)
    {
        return new CommentCollection($commentsRepository->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, CommentsRepository $commentsRepository)
    {
        $commentsRepository->create();

        return $this->respondSuccess('Comment created',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, CommentsRepository $commentsRepository)
    {
        $comment = $commentsRepository->find($id);

        if( ! $comment) {
            return $this->respondNotFound('Comment not fond');
        }

        return new CommentResource($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id, CommentsRepository $commentsRepository)
    {
        if( ! $commentsRepository->find($id)) {
            return $this->respondNotFound('Comment not found');
        }

        $commentsRepository->update($id);
        return $this->respondSuccess('Comment updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CommentsRepository $commentsRepository)
    {
        if( ! $commentsRepository->find($id)) {
            return $this->respondNotFound('Comment not found');
        }
        $commentsRepository->delete($id);

        return $this->respondSuccess('Comment deleted');
    }
}
