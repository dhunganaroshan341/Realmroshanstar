@extends('frontend.layout.main')
@section('content')
    <section class="hero-small mb-4">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('{{ asset('assets/images/banner1.jpg') }}') ;">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container  h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block">
                                    <span class="text-uppercase text-sm letter-spacing"></span>
                                    <h1 class="mb-3 mt-3 text-center">{{ $detail->title ?? '' }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-12 mb-4">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    {{-- <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(144).jpg"
                        class="img-fluid shadow-2-strong rounded mb-4" alt="" /> --}}
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($detail->postImages as $index => $image)
                                <div class="carousel-item  {{ $index == 1 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image) }}"
                                        class="d-block shadow-2-strong rounded mb-2 h-70 w-100" width="100%"
                                        height="700" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="row align-items-center mt-2 mb-4">
                        <div class="col-lg-4 text-center text-lg-start mb-3 m-lg-0">
                            @if ($detail->createdBy->image!=null)
                            <img src="{{ asset('storage/' . $detail->createdBy->image) }}"
                            class="rounded shadow-1-strong me-2" height="35" alt="" loading="lazy" />
                            @else
                            <img src="{{ asset('defaultImage/defaultimage.webp') }}"
                            class="rounded shadow-1-strong me-2" height="35" alt="" loading="lazy" />
                            @endif

                            <span> Published <u>{{ $detail->created_at->format('d M Y') }}</u> by</span>
                            <a href="" class="text-dark">{{ $detail->createdBy->full_name }}</a>
                        </div>
                    </div>
                    <span>{{ $detail->category->title }}</span> - <span>{{ $detail->title }}</span>

                </section>
                <!--Section: Post data-mdb-->

                <!--Section: Text-->
                <section>
                    <p>
                       {!! $detail->description !!}

                    </p>

                    <img src="{{ $detail->postImages[0]->image }}" class="img-fluid shadow-1-strong rounded mb-4"
                        alt="" />

                </section>
                <!--Section: Text-->

                <!--Section: Author-->
                <section class="border-bottom mb-4 pb-4">
                    <div class="row">
                        <div class="col-3">
                            {{-- <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(23).jpg"
                                class="img-fluid shadow-1-strong rounded" alt="" /> --}}

                                @if ($detail->createdBy->image!=null)
                            <img src="{{ asset('storage/' . $detail->createdBy->image) }}"
                            class="img-fluid rounded shadow-1-strong " height="100" width="100" alt="image" loading="lazy" />
                            @else
                            <img src="{{ asset('defaultImage/defaultimage.webp') }}"
                            class="img-fluid rounded shadow-1-strong " height="100" width="100" alt="image" loading="lazy" />
                            @endif
                        </div>

                        <div class="col-9">
                            <p class="mb-2"><strong>{{ $detail->createdBy->full_name }}</strong></p>
                            <a href="{{ $detail->createdBy->facebook_link }}" class="text-dark"><i class="fab fa-facebook-f me-1"></i></a>
                            <a href="{{ $detail->createdBy->twitter_link }}" class="text-dark"><i class="fab fa-twitter me-1"></i></a>
                            <a href="{{ $detail->createdBy->instagram_link }}" class="text-dark"><i class="fab fa-instagram me-1"></i></a>
                            <p>
                                {{ $detail->notes }}
                            </p>
                        </div>
                    </div>
                </section>
                <!--Section: Author-->

                <!--Section: Comments-->
                <section class="border-bottom mb-3">
                    <p class="text-center"><strong>Comments: {{ $post->comments->count() }} </strong></p>

                    <!-- Comment -->
                    @foreach ($comments as $comment)
                    <div class="row mb-4">
                        <div class="col-2">
                            @if ($comment->user->image !=null)
                            <img src="{{ $comment->user->image }}"
                                class="img-fluid shadow-1-strong rounded" alt="" />
                            @else

                            <img src="{{ asset('defaultImage/defaultimage.webp') }}"
                                class="img-fluid shadow-1-strong rounded" alt="" />

                            @endif
                        </div>

                        <div class="col-10">
                            <p class="mb-2"><strong>{{ $comment->user->full_name }}</strong></p>
                            <p>
                                {{ $comment->content }}
                            </p>
                            <div class="comment-content">
                                <p>
                                    <a type="button" class="btnEditPost" data-id="{{ $comment->id }}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    <a type="button" class="btnDeletePost" data-id="{{ $comment->id }}">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </p>
                                <form id="updatePostForm">
                                    <div class="fetchEditComment">

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </section>
                <!--Section: Comments-->

                <!--Section: Reply-->
                <section>
                    <p class="text-center"><strong>Leave a comment</strong></p>

                    <form action="{{ route('store.comment') }}" id="addComment" method="post">
                        <!-- Message input -->
                        <div class="form-outline mb-4" data-mdb-input-init>
                            @csrf
                            <input type="hidden" name="commentable_id" id="commentable_id" value="{{ $detail->id }}">
                            <input type="hidden" name="commentable_type" id="commentable_type"
                            value="{{ isset($detail) ? 'App\\Models\\Post' : '' }}">
                            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                            <label class="form-label" for="form4Example3">Text</label>
                            <p id="validationErrors" class="alert alert-danger d-none mt-2"></p>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4"  id="commentBtn" data-mdb-ripple-init>
                            Comment
                        </button>
                    </form>
                </section>
                <!--Section: Reply-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>

    <script>
        $(document).ready(function() {
            // Add Comment
            $("#addComment").submit(function(event) {
                event.preventDefault();
                $("#commentBtn").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('store.comment') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.auth === null) {
                            window.location.href = "/register";
                        } else {
                            location.reload();
                        }

                    },
                    error: function(response) {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            let errorMessages = '<ul>';
                            $.each(errors, function(key, value) {
                                errorMessages += '<li>' + value[0] +
                                    '</li>';
                            });
                            errorMessages += '</ul>';
                            $('#validationErrors').removeClass('d-none').html(
                                errorMessages);
                        }
                    },
                    complete: function() {
                        $("#commentBtn").prop("disabled", false);
                    }
                });
            })

            $(document).on("click", ".btnEditPost", function() {
                let id = $(this).data('id');
                let clickedElement = this;


                $.ajax({
                    type: "get",
                    url: "/comment/post/edit/" + id,
                    success: function(response) {
                        console.log(response);

                        $(clickedElement).closest(".comment-content").find(".fetchEditComment")
                            .html(`
                <div class="input-group">
                    @csrf
                    <span class="input-group-text">Edit Comment</span>
                    <input type="text" name="comment" class="form-control" id="editContent" value="${response.message.content}">
                    <button type="submit" class="btn btn-success btn-small" id="updateBtn">update</button>
                </div>
            `);
                    },
                    error: function(xhr) {
                        console.log("Error:", xhr);
                    }
                });

                // Update Form
                $(document).off('submit').on("submit", "#updatePostForm", function(event) {
                    event.preventDefault();
                    let formdata = new FormData(this);
                    formdata.append("commentable_id", $("#commentable_id").val());
                    formdata.append("commentable_type", $("#commentable_type").val());
                    formdata.append("content", $("#editContent").val());
                    $("#updateBtn").prop("disabled",true);
                    $.ajax({
                        type: "post",
                        url: "/comment/post/update/" + id,
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            location.reload();
                            // console.log(response);

                        },
                        error: function(xhr) {
                            console.log(xhr);
                        },
                        complete:function(){
                            $("#updateBtn").prop("disabled",false);
                        }
                    })
                })
            });

            // Delete Comment
            $(document).on("click", ".btnDeletePost", function() {
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    type: "get",
                    url: "/comment/post/delete/" + id,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    },
                })

            });
        });
    </script>
@endsection
