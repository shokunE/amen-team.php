<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Img</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Content</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                {foreach $reviews as $review}
                    <tr>
                        <td>{$review['id']}</td>
                        <td>
                            {if !empty($review['path'])}
                                <img src="/{$review['path']}" alt="img" height="60px">
                        {/if}
                        </td>
                        <td>{$review['name']}</td>
                        <td>{$review['email']}</td>
                        <td><textarea class="form-control int-input"
                                   onchange="changeReview( {$review['id']}, this.value, 'text', 'reviews' )">{$review['text']}</textarea></td>
                        <td>
                            <div class="material-switch pull-right">
                                <input {if $review['status'] eq 1} checked {/if} id="someSwitchOptionDefault{$review['id']}" name="someSwitchOption001" type="checkbox"/ onchange="changeValToggle({$review['id']},this.checked,'status','reviews')">
                                <label for="someSwitchOptionDefault{$review['id']}" class="label-default"></label>
                            </div>

                            {if $review['edit']} <div class="changed">Изменен администратором</div>{/if}
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>