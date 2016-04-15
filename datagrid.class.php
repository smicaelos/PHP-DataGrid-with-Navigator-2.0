<?php

/**
 * @author Sérgio Soares 2016
 *
 * email serguiomicaelo@gmail.com
 *
 * "PHP 3 datagrid with navigator 2.0"
 *
 * datagrid.class.php for PHP 3
 *
 * This class was written using PHP 3
 * You can use it at your will, it's free to use!
 *
 *
 */
class datagrid {

 var $cols = "2";
 var $rows = "5";
 var $page = "";
 var $index = "1";
 var $arr = array();
 var $paint_grid = TRUE;
 var $registo_index = "1";

 
	/**
	 * @return string
	 *
	 * This funtion returns datagrid cells with mysql values
	 *
	 */
	function template_db() {

		$connection = mysql_connect("localhost","root","") or die("Erro: " .mysql_error());

		mysql_select_db("datagrid");

		$sql="select * from produtos where id='".$this->arr[$this->registo_index-1]."'";

		$result=mysql_query($sql);

		$arr = array('id','url','title','text','price');

		while ($reg=mysql_fetch_array($result)) {
		
			return "<table Border='0' cellspacing='10' cellpadding='0' width='300'>
				<tr>
					<td rowspan='3'><img src=" . $reg[$arr[1]] . " height='100'></td>
					<td colspan='2' cellspacing='0'><b><font size='4'>".$reg[$arr[2]]."</font></b></td>
				</tr>
					<tr><td colspan='2'>".$reg[$arr[3]]."</td>
				</tr>
					<tr><td><b><font color='red'>Price: </b></font>".$reg[$arr[4]]."€</td>
					<td>carrinho</td>
				</tr>
				</table>";
		}

	}


	/**
	 * @return Total of mysql table records
	 */
	function get_num_rows() {
	
		$sql="select * from products";
	
		$result=mysql_query($sql);
	
		$total_records = mysql_num_rows($result);
	
		return $total_records;
	
	}

	/**
	 * fetchs var $arr
	 */
	function fill_array() {

		$index="0";

		$connection = mysql_connect("localhost","root","") or die("Erro: " .mysql_error());

		mysql_select_db("datagrid");

		$sql="select * from products";

		$result=mysql_query($sql);

		while ($reg=mysql_fetch_array($result)) {

			$this->arr[$index] = $reg['id'];
			
			$index++;

		}

	}

	/**
	 * This function makes the construction of full output datagrid table.
	 *
	 * @param  $cols -> number of collums.
	 *
	 * @param  $rows -> number of rows.
	 *
	 * @param  $index -> get number of the page with $_GET['page'] to get
	 * the page number on url "&page="datagrid page number".
	 *
	 * @param  $paint -> Boolean, if true, it returns each pair number of the row with a second color.
	 */
	function doTable($cols, $rows, $index, $paint) {

		$this->cols=$cols;
		$this->rows=$rows;
		$this->registo_index=$index;
		$this->paint_grid=$paint;
		$col_index="1";
		$totalRec=($this->rows*$this->cols);
		$numRows=$this->get_num_rows();
		$lastPageN=$_GET['i'];
		
		$numPag=floor($numRows/$totalRec)+1;
		$numMaxPage=$totalRec*$numPag;
		$rowsLeft=$numMaxPage-$numRows;
		$recsLeft=$totalRec-$rowsLeft;
		
		$this->fill_array();

		if ($this->registo_index=="") {

			$this->registo_index=1;

		}

		echo("<table Border='0' cellspacing='0' cellpadding='0'>\r");
		
		for ($l=1; $l<=$this->rows; $l++) {
		
			echo("<tr>\r");
			
			for ($c=1; $c<=$this->cols; $c++) {
				
				if ($this->paint_grid) {
				
					if ($col_index > $this->cols*2) {
						$col_index="1";
					}
					
					if ($recsLeft > 0) {
					
						if ($col_index<=$this->cols) {
	
							echo("<td bgcolor=#7c7c7c>".$this->template_db()."</td>\r");
							
							
						} else {
	
							echo("<td bgcolor=#8c8c8c>".$this->template_db()."</td>\r");
							
						}
						
						if ($numPag == $lastPageN){
							
							$recsLeft--;
							
						}
						
					}

					$this->registo_index+=1;
					$col_index +=1;

				} else {

					if ($recsLeft > 0) {
						
						echo("<td>".$this->template_db()."</td>\r");
						$this->registo_index +=1;
						$recsLeft--;
						
					}
					
				}
			}
			
			echo "</tr>\r";

		}
		
		echo "</table>\r";
	}
	

	/**
	 * @param $page -> get number of the page with $_GET['page'] to get 
	 * the page number on url "&page="datagrid page number".
	 * 
	 * @param $num -> you can choose how much pages represented by a page number will appear into the 
	 * navigator, between "prev" and "Next" link buttons.
	 */
	function navigation($page, $num) {
		
		$this->page = $page;
		$group_index = 1;

		if ($this->get_num_rows() < ($this->rows*$this->cols)) {

			$num_pag = 1;

		} else {

			$num_pag = ceil(($this->get_num_rows()/($this->rows*$this->cols))+1);

		}

		if ($_GET['i'] > 1) {

			$a=$_GET['i']-1;

			$index = $_GET['bindex']-1;
			$page_prev = $this->page-($this->rows*$this->cols);

			if ($_GET['bindex'] <= 1) {

				echo "<a href=index.php?page=".$page_prev."&bindex=1&i=".$a.">Prev</a>\n";

			} else {

				echo "<a href=index.php?page=".$page_prev."&bindex=".$index."&i=".$a.">Prev</a>\n";

			}			
		}

		if ($this->get_num_rows() > ($this->rows*$this->cols)) {
			
			$limit = $this->get_num_rows();
			
			if ($_GET['bindex']=="") {

				$this->index = 1;

			} else {
				if ($num_pag > $num) {
					if ($_GET['i'] > floor($num/2)) {
						$this->index = $_GET['i']-floor($num/2);
					} 
				} else {

				$this->index = $_GET['bindex'];
				}
			}
			
			for ($r=1; $r <= $num; $r++) {

				$group_index=$this->index-$r+1;
				
				if ($this->index != 1) {

					$pag=($this->index*($this->cols*$this->rows)+1)-($this->cols*$this->rows);

				} else {

					$pag=1;

				}				
				
				if ($pag <= $limit) {

					if ($_GET['i'] == $this->index) {

						echo "| <a href=index.php?page=".$pag."&bindex=".$group_index."&i=".$this->index."><b><font color='green'>$this->index</font></b></a> | ";
	
					} else {

						echo "| <a href=index.php?page=".$pag."&bindex=".$group_index."&i=".$this->index.">$this->index</a> | ";

					}

				}

				$this->index+=1;

			}

		}

		if ($_GET['i'] < $num_pag-1) {

			$last_set = ($num_pag - $num);

			if ($_GET['i'] == "") {
			
				$i = 2;

			} else {

				$i=$_GET['i'] + 1;

			}			

			if ($_GET['bindex'] == "") {

				if ($num_pag > $num) {

					$index = 2;

				} else {

					$index = 1;

				}

			} else {

				if ($num_pag > $num) {

					$index = $_GET['bindex']+1;

				} else {

					$index = $_GET['bindex'];

				}

			}

  			if ($this->page == "") {

  				$page_next=$this->page+(($this->rows*$this->cols)+1);
  	
  			} else {

				$page_next=$this->page+($this->rows*$this->cols);

  			}

			if ($index != $last_set) {

				echo "<a href=index.php?page=".$page_next."&bindex=".$index."&i=".$i.">Next</a>\n";

			} else {

				echo "<a href=index.php?page=".$page_next."&bindex=".$last_set."&i=".$i.">Next</a>\n";	

  			}


		}




	}

}


?>
	