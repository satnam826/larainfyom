<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostAuthorRequest;
use App\Http\Requests\UpdatePostAuthorRequest;
use App\Repositories\PostAuthorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PostAuthorController extends AppBaseController
{
    /** @var  PostAuthorRepository */
    private $postAuthorRepository;

    public function __construct(PostAuthorRepository $postAuthorRepo)
    {
        $this->postAuthorRepository = $postAuthorRepo;
    }

    /**
     * Display a listing of the PostAuthor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->postAuthorRepository->pushCriteria(new RequestCriteria($request));
        $postAuthors = $this->postAuthorRepository->all();

        return view('post_authors.index')
            ->with('postAuthors', $postAuthors);
    }

    /**
     * Show the form for creating a new PostAuthor.
     *
     * @return Response
     */
    public function create()
    {
        return view('post_authors.create');
    }

    /**
     * Store a newly created PostAuthor in storage.
     *
     * @param CreatePostAuthorRequest $request
     *
     * @return Response
     */
    public function store(CreatePostAuthorRequest $request)
    {
        $input = $request->all();

        $postAuthor = $this->postAuthorRepository->create($input);

        Flash::success('Post Author saved successfully.');

        return redirect(route('postAuthors.index'));
    }

    /**
     * Display the specified PostAuthor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postAuthor = $this->postAuthorRepository->findWithoutFail($id);

        if (empty($postAuthor)) {
            Flash::error('Post Author not found');

            return redirect(route('postAuthors.index'));
        }

        return view('post_authors.show')->with('postAuthor', $postAuthor);
    }

    /**
     * Show the form for editing the specified PostAuthor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postAuthor = $this->postAuthorRepository->findWithoutFail($id);

        if (empty($postAuthor)) {
            Flash::error('Post Author not found');

            return redirect(route('postAuthors.index'));
        }

        return view('post_authors.edit')->with('postAuthor', $postAuthor);
    }

    /**
     * Update the specified PostAuthor in storage.
     *
     * @param  int              $id
     * @param UpdatePostAuthorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostAuthorRequest $request)
    {
        $postAuthor = $this->postAuthorRepository->findWithoutFail($id);

        if (empty($postAuthor)) {
            Flash::error('Post Author not found');

            return redirect(route('postAuthors.index'));
        }

        $postAuthor = $this->postAuthorRepository->update($request->all(), $id);

        Flash::success('Post Author updated successfully.');

        return redirect(route('postAuthors.index'));
    }

    /**
     * Remove the specified PostAuthor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postAuthor = $this->postAuthorRepository->findWithoutFail($id);

        if (empty($postAuthor)) {
            Flash::error('Post Author not found');

            return redirect(route('postAuthors.index'));
        }

        $this->postAuthorRepository->delete($id);

        Flash::success('Post Author deleted successfully.');

        return redirect(route('postAuthors.index'));
    }
}
