<form action="/" class="form-inline my-2 my-lg-0" method="get">
	<div class="input-group">
		<input
			class="form-control"
			type="search"
			name="s"
			value="<?php the_search_query(); ?>"
			placeholder="Recherche"
			aria-label="Recherche"
		>
		<div class="input-group-append">
			<button class="btn btn-outline-secondary" type="submit">
				<i class="fas fa-search"></i>
			</button>
		</div>
	</div>
</form>
