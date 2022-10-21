<div id="bookDisplayBox">
				<?php
		// $host="localhost";
		// $user="root";
		// $password="";
		// $db="libraryms";

        $booksConn = mysqli_connect($host,$user,$password,$db);
        if(!$booksConn){
            echo("Connection error");
            exit();
        }

        $queryBid = "select * from borrowedbook_data where sid='".$sid."'";
        $result = mysqli_query($booksConn,$queryBid);

        if(mysqli_num_rows($result)!=0){
        	echo "<label>Bid:</label>";
            while($bidRows = mysqli_fetch_assoc($result)){ 

                $bid=$bidRows['bid'];

                $queryBook = "select * from books_data where bid='".$bid."'";
                $bookResult = mysqli_query($booksConn,$queryBook);
                
                if(mysqli_num_rows($bookQuery)>0){
                    $bookRows = mysqli_fetch_assoc($bookResult);

 					//print
    		    	            
	                    
                }
            }
        }
?>

				<label>BookName:</label>
				<label>Author:</label>
			</div>