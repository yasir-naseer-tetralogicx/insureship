<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
      <a class="navbar-brand" href="/">InsureShip</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="/">Orders <span class="sr-only">(current)</span></a>
              </li>


          </ul>
	<form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('home') }}">
      		<input class="form-control mr-sm-2" type="search" placeholder="Search for order" aria-label="Search" name="order">
      		<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    	</form>
      </div>
  </div>
</nav>
