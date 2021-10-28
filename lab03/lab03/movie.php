<!DOCTYPE html>
<!-- Autore: Luca Zhou -->
<html lang="en">
	<head> 
		<title>Rancid Tomatoes</title>
        <link href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif" type="image/gif" rel="icon">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="movie.css" type="text/css" rel="stylesheet">
	</head>

    <body>  
        <?php #scelta del film
        $movie=$_GET["film"];
        ?>

		<div id = "banner">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
		</div>
        
        <?php #titolo,anno e %
        $movietitle = file("$movie\info.txt");
        list($a,$b,$c)= $movietitle;
        ?>

        <h1><?= $a.$b ?></h1>

        <div id = "main"> <!-- il div "main" e' stato aggiunto per contenere 
            					sia la componente sinistra e destra del layout -->
            <div id = "right">

				<div>
                <?php #Stampa immagine film
                    print "<img src=\"$movie\overview.png\"/>";
                ?>
				</div>

                <?php
                $overview = file("$movie\overview.txt");
                ?>

				<dl>
                <?php #Descrizione del film

                foreach ($overview as $line)
                {
                    list($dt,$dd) = explode(':',$line);
                
                ?>
                <dt><?=$dt?></dt>
                <dd><?=$dd?></dd>
                <?}?>
				</dl>
                   
            </div> <!-- chiusura div "right" -->
            <div id = "left">
				<div id ="left-top">
                <?php # voto in % film
				
                    if ($c>"60") 
                    {
                        print "<img src=https://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/freshbig.png>";
                    }
                    else
                        print "<img src=http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png>";
                ?>
                    <span class="evaluation"><?php print $c."%" ?></span>
				</div>

				<?php
						$file = glob("$movie/review*.txt");
						$count = count($file);
				?>
                <div id="columns">
                    <div id="leftcolumn">
                        <?php for($i = 0;$i<ceil($count/2);$i++)   #reciew a sinistra
                        {
                            $txt=basename($file[$i]);
                            $review = array_map('trim',file("$movie/$txt"));
                            
                        ?>
						<p class="quotes">
                    		<span >
                                <?php  #fresh/rotten
								if ($review[1]=="FRESH")
								print "<img src=http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif";
								else
								print "<img src=http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif";
                                ?>
                                <q><?php print $review[0] ?></q>
							</span>
						</p>
						<p class="reviewers">
							<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
							<?php print $review[2]; ?><br>
                        	<span class="publications"><?php print $review[3]; ?></span>
						</p>
                        <?}?>


                    </div> <!-- chiusura div "leftcolumn" -->
                    <div id = "rightcolumn">
					<?php for($i =ceil($count/2);$i<$count;$i++)   #reciew a destra
                        {
                            $txt=basename($file[$i]);
                            $review = array_map('trim',file("$movie/$txt"));
                        ?>
						<p class="quotes">
                    		<span >
                                <?php 
								if ($review[1]=="FRESH")
								print "<img src=http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif";
								else
								print "<img src=http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif";
                                ?>
                                <q><?php print $review[0] ?></q>
							</span>
						</p>
						<p class="reviewers">
							<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
							<?php print $review[2]; ?><br>
                        	<span class="publications"><?php print $review[3]; ?></span>
						</p>
                        <?}?>
                    </div> <!-- chiusura div "rigthcolumn" -->
                </div> <!-- chiusura div "columns" -->
            </div> <!-- chiusura div "left" -->
            
			<p id="bottom">(1-10) of 88</p>
            
        </div><!-- chiusura div "main" -->
		<div id="validators">
			<a href="http://validator.w3.org/check/referer">
				<img width="88" src="https://upload.wikimedia.org/wikipedia/commons/b/bb/W3C_HTML5_certified.png " alt="Valid HTML5!">
			</a>			
			<br>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!">
			</a>
		</div> <!-- chiusura div "validators" -->
	</body>
</html>
