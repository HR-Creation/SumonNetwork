<?php

if (isset($_GET['search'])) {

			$hh=$_GET['search'];

			if ($hh)
			{
			    echo "<script>
                window.location='clint_list.php?search_id=$hh';
                </script>";
			}
	}

;?>