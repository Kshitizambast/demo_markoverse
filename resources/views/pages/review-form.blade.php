<fieldset class="rating">
            <legend>Please rate:</legend>
            <input class="star star-5" type="radio" id="star5" name="review_points" value="5" />
            <label class="star star-5" for="star5" title="Rocks!">5 stars</label>
            <input class="star star-4" type="radio" id="star4" name="review_points" value="4" />
            <label class="star star-4" for="star4" title="Pretty good">4 stars</label>
            <input class="star star-3" type="radio" id="star3" name="review_points" value="3" />
            <label class="star star-3" for="star3" title="Meh">3 stars</label>
            <input class="star star-2" type="radio" id="star2" name="review_points" value="2" />
            <label class="star star-2" for="star2" title="Kinda bad">2 stars</label>
            <input class="star star-1" type="radio" id="star1" name="review_points" value="1" />
            <label class="star star-1" for="star1" title="Sucks big time">1 star</label>
        </fieldset>
         
      
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="2" placeholder="Your Comment Here..." name="comment"></textarea>
          <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
          <input type="hidden" name="product_id" value="{{$value->id}}">
          <button type="submit" class="btn btn-primary mt-1 float-right">Submit</button>

          