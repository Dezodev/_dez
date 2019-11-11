<?php
/*
 * Template Name: Trystyle Page
**/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'post' );

			?>

				<h1>Heading 1</h1>
				<h2>Heading 2</h2>
				<h3>Heading 3</h3>
				<h4>Heading 4</h4>
				<h5>Heading 5</h5>
				<h6>Heading 6</h6>

				<hr/>

				<p>A paragraph (from the Greek paragraphos, “to write beside” or “written beside”) is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually an expected part of formal writing, used to organize longer prose.</p>

				<hr/>

				<blockquote>
					<p>A block quotation (also known as a long quotation or extract) is a quotation in a written document, that is set off from the main text as a paragraph, or block of text.</p>
					<p>It is typically distinguished visually using indentation and a different typeface or smaller size quotation. It may or may not include a citation, usually placed at the bottom.</p>
					<cite><a href="#!">Said no one, ever.</a></cite>
				</blockquote>

				<hr/>

				<h2>Lists</h2>
				<div>
					<h3>Definition list</h3>
					<dl>
						<dt>Definition List Title</dt>
						<dd>This is a definition list division.</dd>
					</dl>
					<h3>Ordered List</h3>
					<ol>
						<li>List Item 1</li>
						<li>List Item 2</li>
						<li>List Item 3</li>
					</ol>
					<h3>Unordered List</h3>
					<ul>
						<li>List Item 1</li>
						<li>List Item 2
							<ul>
								<li>List Item 2-1</li>
								<li>List Item 2-2</li>
								<li>List Item 2-3</li>
							</ul>
						</li>
						<li>List Item 3</li>
					</ul>
				</div>

				<hr>

				<h2>Inline elements</h2>
				<div>
					<p><a href="#!">This is a text link</a>.</p>
					<p><strong>Strong is used to indicate strong importance.</strong></p>
					<p><em>This text has added emphasis.</em></p>
					<p>The <b>b element</b> is stylistically different text from normal text, without any special importance.</p>
					<p>The <i>i element</i> is text that is offset from the normal text.</p>
					<p>The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation.</p>
					<p><del>This text is deleted</del> and <ins>This text is inserted</ins>.</p>
					<p><s>This text has a strikethrough</s>.</p>
					<p>Superscript<sup>®</sup>.</p>
					<p>Subscript for things like H<sub>2</sub>O.</p>
					<p><small>This small text is small for for fine print, etc.</small></p>
					<p>Abbreviation: <abbr title="HyperText Markup Language">HTML</abbr></p>
					<p><q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline quotation.</q></p>
					<p><cite>This is a citation.</cite></p>
					<p>The <dfn>dfn element</dfn> indicates a definition.</p>
					<p>The <mark>mark element</mark> indicates a highlight.</p>
					<p>The <var>variable element</var>, such as <var>x</var> = <var>y</var>.</p>
					<p>The time element: <time datetime="2013-04-06T12:32+00:00">2 weeks ago</time></p>
				</div>

				<hr/>

				<h2>Form elements</h2>
				<form>
					<fieldset id="forms__input">
						<legend>Input fields</legend>
						<div class="form-group">
							<label for="input01">Text Input</label>
							<input type="text" class="form-control" id="input01" placeholder="Text Input">
						</div>
						<div class="form-group">
							<label for="input02">Password</label>
							<input type="password" class="form-control" id="input02" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="input03">Web Address</label>
							<input type="url" class="form-control" id="input03" placeholder="Web Address">
						</div>
						<div class="form-group">
							<label for="input04">Email</label>
							<input type="email" class="form-control" id="input04" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="input05">Phone number</label>
							<input type="tel" class="form-control" id="input05" placeholder="Phone number">
						</div>
						<div class="form-group">
							<label for="input06">Search</label>
							<input type="search" class="form-control" id="input06" placeholder="Search">
						</div>
						<div class="form-group">
							<label for="input07">Number</label>
							<input type="number" class="form-control" id="input07" placeholder="Number">
						</div>
					</fieldset>
					<p><a href="#top">[Top]</a></p>
					<fieldset id="forms__select">
						<legend>Select menus</legend>
						<div class="form-group">
							<label for="select">Select</label>
							<select id="select" class="form-control">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
								<option>Option 4</option>
								<option>Option 5</option>
							</select>
						</div>
					</fieldset>
					<p><a href="#top">[Top]</a></p>
					<fieldset id="forms__checkbox">
						<legend>Checkboxes</legend>
						<div class="checkbox">
							<label>
								<input type="checkbox" value=""> Option one
							</label>
						</div>
						<div class="checkbox disabled">
							<label>
								<input type="checkbox" value="" disabled> Option two
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" value=""> Option three
							</label>
						</div>
					</fieldset>
					<p><a href="#top">[Top]</a></p>
					<fieldset id="forms__radio">
						<legend>Radio buttons</legend>
						<div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
								Option one is this and that&mdash;be sure to include why it's great
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								Option two can be something else and selecting it will deselect option one
							</label>
						</div>
						<div class="radio disabled">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
								Option three is disabled
							</label>
						</div>
					</fieldset>
					<p><a href="#top">[Top]</a></p>
					<fieldset id="forms__textareas">
						<legend>Textareas</legend>
						<textarea class="form-control" rows="3"></textarea>
					</fieldset>
					<p><a href="#top">[Top]</a></p>
					<fieldset id="forms__html5">
						<legend>HTML5 inputs</legend>
						<div class="form-group">
							<label for="input10">Color</label>
							<input class="form-control" id="input10" type="color" value="#000000">
						</div>
						<div class="form-group">
							<label for="input11">Range</label>
							<input class="form-control" id="input11" type="range" value="10">
						</div>
						<div class="form-group">
							<label for="input12">Date</label>
							<input class="form-control" id="input12" type="date" value="1970-01-01">
						</div>
						<div class="form-group">
							<label for="input13">Month</label>
							<input class="form-control" id="input13" type="month" value="1970-01">
						</div>
						<div class="form-group">
							<label for="input14">Datetime</label>
							<input class="form-control" id="input14" type="datetime" value="1970-01-01T00:00:00Z">
						</div>
						<div class="form-group">
							<label for="input15">Datetime-local input</label>
							<input class="form-control" id="input15" type="datetime-local" value="1970-01-01T00:00">
						</div>
					</fieldset>
					<p><a href="#top">[Top]</a></p>
					<fieldset id="forms__action">
						<legend>Action buttons</legend>
						<p>
							<input class="btn btn-secondary" type="submit" value="<input type=submit>">
							<input class="btn btn-secondary" type="button" value="<input type=button>">
							<input class="btn btn-secondary" type="reset" value="<input type=reset>">
							<input class="btn btn-secondary" type="submit" value="<input disabled>" disabled>
						</p>
						<p>
							<button class="btn btn-secondary" type="submit">&lt;button type=submit&gt;</button>
							<button class="btn btn-secondary" type="button">&lt;button type=button&gt;</button>
							<button class="btn btn-secondary" type="reset">&lt;button type=reset&gt;</button>
							<button class="btn btn-secondary" type="button" disabled>&lt;button disabled&gt;</button>
						</p>
					</fieldset>
					<p><a href="#top">[Top]</a></p>
				</form>
				<hr/>

				<h2>Table</h2>

				<div class="">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Username</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
						</tbody>
					</table>
				</div>

				<hr>
				<h2>Buttons</h2>

				<div class="mb-2">
					<button type="button" class="btn btn-secondary">Secondary</button>
					<button type="button" class="btn btn-primary">Primary</button>
					<button type="button" class="btn btn-success">Success</button>
					<button type="button" class="btn btn-info">Info</button>
					<button type="button" class="btn btn-warning">Warning</button>
					<button type="button" class="btn btn-danger">Danger</button>
					<button type="button" class="btn btn-link">Link</button>
				</div>
				<div class="mb-2">
					<button type="button" class="btn btn-secondary disabled">Secondary</button>
					<button type="button" class="btn btn-primary disabled">Primary</button>
					<button type="button" class="btn btn-success disabled">Success</button>
					<button type="button" class="btn btn-info disabled">Info</button>
					<button type="button" class="btn btn-warning disabled">Warning</button>
					<button type="button" class="btn btn-danger disabled">Danger</button>
					<button type="button" class="btn btn-link disabled">Link</button>
				</div>
				<div class="mb-2">
					<button type="button" class="btn btn-outline-secondary">Secondary</button>
					<button type="button" class="btn btn-outline-primary">Primary</button>
					<button type="button" class="btn btn-outline-success">Success</button>
					<button type="button" class="btn btn-outline-info">Info</button>
					<button type="button" class="btn btn-outline-warning">Warning</button>
					<button type="button" class="btn btn-outline-danger">Danger</button>
				</div>
				<div class="mb-2">
					<button type="button" class="btn btn-outline-secondary disabled">Secondary</button>
					<button type="button" class="btn btn-outline-primary disabled">Primary</button>
					<button type="button" class="btn btn-outline-success disabled">Success</button>
					<button type="button" class="btn btn-outline-info disabled">Info</button>
					<button type="button" class="btn btn-outline-warning disabled">Warning</button>
					<button type="button" class="btn btn-outline-danger disabled">Danger</button>
				</div>

				<hr />
				<h2>Contextual backgrounds</h2>

				<div class="">
					<p class="bg-primary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus deserunt sint suscipit.</p>
					<p class="bg-success">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit veniam aperiam quasi.</p>
					<p class="bg-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maxime fugiat iure.</p>
					<p class="bg-warning">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum iste, quisquam? Quia.</p>
					<p class="bg-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, eaque inventore ipsa?</p>
				</div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
