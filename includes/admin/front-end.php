<ul class="ckan-articles frontend">

    <?php


    $total_articles = count( $ckan_results->{'response'}->{'docs'} );

    for( $i = $total_articles - 1; $i >= $total_articles - $num_articles; $i-- ):
        
        ;?>

        <div class="ckan-articles">

            <div class="ckan-articles-info">
                <?php if( $display_image == '1' ): ?>

                    <?php if( count($ckan_results->{'response'}->{'docs'}[$i]->{'multimedia'}) > 0): ?>

                        <img width="120px" src="<?php echo "https://demo.ckan.org/" . $ckan_results->{'response'}->{'docs'}[$i]->{'multimedia'}[1]->{'url'}; ?>">

                    <?php endif; ?>

                <?php endif; ?>

                <div class="ckan-articles-name">
                    <a href="<?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'web_url'}; ?>">
                        <?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'headline'}->{'main'}; ?>
                    </a>
                </div>

                <div>
                    <?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'lead_paragraph'}; ?>
                </div>

            </div>

        </div>


    <?php endfor; ?>

</ul>
<?php


//include_once('data_template.php');

 ?>
<style>
    * {
        box-sizing: border-box;
    }

    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
        color: #0d0d0d;
    }

    #myUL li a {

        margin-top: -1px; /* Prevent double borders */

        padding: 18px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee;
    }
</style>



<h2></h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for datasets.." title="Type in a name">

<ul id="myUL">
    <li><a href="#">Category</a></li>
    <li><a href="#">Organization</a></li>

    <li><a href="#">Format</a></li>

</ul>

<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>





