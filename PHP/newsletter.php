<!--Brittney Jackson, December 9 2020-->
<?php
//check if session already started, if not then start
if (!isset ($_SESSION) || session_id() == ''){
  session_start();
}
//check if user is logged in
if (empty($_SESSION['loggedin']) || ! $_SESSION['loggedin'])
{
   $_SESSION['loginMsg'] = "Please login to continue";
   header('Location: login.php');
   exit;
}
else
{
  require('header.php');
  require('menu.php');
}
?>

<img src="christmas.png" class="newsBanner"  alt="christmas greenery banner december 2020">
<p class="bannerCredit"><span>Photo by <a href="https://unsplash.com/photos/VDXtVYJVj7A">Annie Spratt</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></p>
<h2 class="newsletterTitle">Historical Society of Eastern Virginia Monthly Newsletter</h2>
<br>
<br>
<div class="cookieContainer">
<img src="cookies.jpg" class="cookieImg" height="300" width="300" alt="christmas molasses cookies">
</div>
<p class="cookieCredit"><span>Photo by <a href="https://unsplash.com/photos/z2wlX1zPgJ0">Alexandra Kusper</a> on <a href="https://unsplash.com/s/photos/molasses-cookies?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></p>
<h3 class="recipeTitle">Molasses Cookies</h3>
<h3 class="recipeHistory">Prior to the Molasses Act of 1733, molasses was a common sweetener used for baking in colonial times.<br> After the act was replaced by the Sugar Act of 1764, molasses gained back its popularity due to it being an inexpensive sweetener.<br> After World War I, molasses declined in popularity in favor of the now cheaper refined sugar.</h3>
<div class="cookieContainer">
<p>2 cups all-purpose flour <br>1 teaspoon ground ginger<br>1/4 teaspoon cloves
<br>1/4 teaspoon nutmeg<br>1 teaspoon cinnamon<br>1/2 teaspoon salt<br>1/2 teaspoon baking soda<br>5 tablespoons unsalted butter<br>1/2 cup sugar<br>1/2 cup molasses<br>1/3 cup dark rum</p>
</div>
<div class="cookieContainer">
<ol type="1" id="recipeList">
<li>Preheat oven to 375 degrees F. Prepare baking sheet by greasing pan or lining with parchment.</li>
<li>Whisk flour, salt, spices, and baking soda.</li>
<li>In a separate bowl beat butter and sugar together then add in molasses.</li>
<li>Add in dry ingredients and rum, alternating dry and wet.</li>
<li>Using a tablespoon, scoop cookie dough into balls and place on prepared baking sheet.</li>
<li>Bake cookies for 11-12 minutes or until the tops crack.</li>
<li>Remove from oven and let cool before lifting from pan.</li>
</ol>
<p class="recipeSrc">Recipe Courtesy of <a href="https://www.kingarthurbaking.com/recipes/soft-molasses-cookies-recipe">King Arthur Flour</a></p>
</div>

<br><br><br>
<img src="oldhouse.jpg" alt="rundown old Victorian house" class="houseImg" height="300" width="300">
<p class="houseCredit"><span>Photo by <a href="https://unsplash.com/photos/oVQeXfC0HoY">Malin</a> on <a href="https://unsplash.com/s/photos/rundown-house?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></p>
<h3 class="houseTitle">Adams House Restoration</h3>
<p class="houseContent">The Historical Society of Eastern Virginia is currently partnered with Forrest Architecture and Choice Brick Company to begin restoration of the Adams House at 345 Maple Street. Built in 1888 by Henry Adams, the once stately brick Victorian home has been in disrepair for the last 50 years. We are working with contractor Fred Dunn of Dunn Construction once we get started. "This is going to require a lot of hardwork, " says Dunn, "the foundation is crumbling, the floors are water damaged from the big flood in '79, it needs all new wiring and plumbing too, but I am looking forward to helping with the restoration of this once grand home." The project will officially begin January 2021.</p>

<br><br><br>

<img src="newsPhotos.jpg" alt="two old black and white photographs of women" class="archiveImg" height="300" width="300">
<p class="archiveCredit"><span>Photo by <a href="https://www.freeimages.com/photo/old-photos-1434448">Julia Freeman-Woolpert</a> from <a href="https://freeimages.com/">FreeImages</a></span></p>
<h3 class="archiveTitle">New Archival Additions</h3>
<p class="archiveContent">Thanks to the contributions of Anne Park and Donald Smith, HSEVA now has new documents and artifacts added to our archival repository. Ms. Park contributed the following: Holmes, Nelson. 18th Century Collection of Maps of Eastern Virginia.
Mr. Smith contributed the following: A collection of 22 photographs of New Pine, circa 1900-1910. Postcards sent from Mayor Graham of New Pine dated 1892-1893.
</p>

<br>
<h3 class="newsTitle">**Announcement**</h3>
<p class="newsContent">Our curator Jane Hyatt, PhD will be retiring at the end of this year. She has been a great pillar of support to our organization and we will forever be indebted to her. She worked tirelessly to curate artifacts and organize various events for the historical society. With a PhD in American History and a Master's in Museum Studies, Mrs. Hyatt is an expert in her field. After working for 20 years as the curator for the Briggs Museum in Lachlan, she came to work for HSEVA's museum when it opened in 2005. We will be opening the position in search for a new curator in January 2021.</p> 
<hr>
<?php require('footer.php');?>
