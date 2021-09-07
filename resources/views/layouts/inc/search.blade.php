<div class="search-bar row">
  <fieldset>
      <form class="search-form" method="get" action="{{route('search')}}">
          <div class="form-group">
              <i class="lni-bullhorn"></i>
              <input type="text" name="search" class="form-control"
                  placeholder="What are you looking for" />
          </div>
          <search></search>
          <button class="btn btn-common" type="submit">
              <i class="lni-search"></i> Search Now
          </button>
      </form>
  </fieldset>
</div>