<div class="search-bar">
  <fieldset>
    <form class="search-form" method="get" action="{{route('search')}}">
      <div class="form-group">
        <i class="lni-bullhorn"></i>
        <input type="text" name="search" class="form-control" placeholder="What are you looking for" />
      </div>
      <div class="form-group">
        <div class="tg-select">
          <select name="categoryId">
            <option value="0">All Categories</option>
            @foreach ($menus as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          <i class="fas fa-angle-down"></i>
        </div>
      </div>
      <div class="form-group">
        <div class="tg-select">
          <select>
            {{-- for indian states only --}}
            <option value="">All States</option>
            
            <option value=""></option>

            <i class="lnr-chevron-down"></i>
          </select>
          <i class="fas fa-angle-down"></i>
        </div>
      </div>
      <button class="btn btn-common" type="submit">
        <i class="lni-search"></i> Search Now
      </button>
    </form>
  </fieldset>
</div>