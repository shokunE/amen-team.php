
<div class="container mt-5">
    <div class="row">

        <div class="col-12 mb-5">
            <div class="sort d-flex justify-content-end">
                <form class="form-inline" method="post" action="">
                    <div class="input-group mb-2 mr-sm-2">
                        <select class="form-control" name="sortReview">

                            <option value="created_at|DESC"
                                    {if $sortReviewSelect['field'] eq 'created_at' && $sortReviewSelect['sort'] eq 'DESC'}selected{/if}
                            >От новых к старым</option>

                            <option value="created_at|ASC"
                                    {if $sortReviewSelect['field'] eq 'created_at' && $sortReviewSelect['sort'] eq 'ASC'}selected{/if}
                            >От старых к новым</option>

                            <option value="name|ASC"
                                    {if $sortReviewSelect['field'] eq 'name' && $sortReviewSelect['sort'] eq 'ASC'}selected{/if}
                            >По имени А-Я</option>

                            <option value="name|DESC"
                                    {if $sortReviewSelect['field'] eq 'name' && $sortReviewSelect['sort'] eq 'DESC'}selected{/if}
                            >По имени Я-А</option>

                            <option value="email|ASC"
                                    {if $sortReviewSelect['field'] eq 'email' && $sortReviewSelect['sort'] eq 'ASC'}selected{/if}
                            >По email A-Z</option>

                            <option value="email|DESC"
                                    {if $sortReviewSelect['field'] eq 'email' && $sortReviewSelect['sort'] eq 'DESC'}selected{/if}
                            >По email Z-A</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="sortReviewSubmit">Submit</button>
                </form>

            </div>
        </div>


        {foreach $reviews as $review}
            <div class="col-4">
                <div class="review">

                    {if !empty($review['path'])}
                        <img src="{$review['path']}" alt="..." class="review-img">
                    {/if}

                    <div class="review-body">
                        <div class="review-body_name">{$review['name']}</div>
                        <div class="review-body_email">{$review['email']}</div>
                        <div class="review-body_coment">{$review['text']}</div>
                        <div class="review-body_data">{$review['created_at']|date_format:"%d.%m.%Y %H:%M:%S"}</div>
                    </div>
                </div>
            </div>
        {/foreach}

    </div>
</div>

<div class="container mt-5">
    <div class="row">

        <div class="col-12">
            {if $formError}
                {foreach $formError as $error}
                    <div class="alert alert-danger" role="alert">
                        {$error}
                    </div>
                {/foreach}
            {/if}

            {if isset($formSuccess)}
                <div class="alert alert-success" role="alert">
                    {$formSuccess}
                </div>
            {/if}
        </div>

        <div class="col-8 offset-2 mb-5">
            <form enctype="multipart/form-data" class="mt-5" action="" method="post">
                <div class="form-group">
                    <label for="inputName">Имя</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{$formData['name']|default:''}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{$formData['email']|default:''}">
                </div>

                <div class="form-group">
                    <label for="Review">Текст сообщения</label>
                    <textarea class="form-control" id="Review" rows="3" name="text">{$formData['text']|default:''}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Изображение</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                </div>

                <button type="submit" class="btn btn-primary" name="sendReview">Отправить</button>
            </form>
        </div>
    </div>
</div>

