									
									
									<?php 
								 
									$precoMovel=false;
									$categories = get_the_category($postID);
								 
									 $ativarIdCatPrecoRelativo=  get_option('ativarIdCatPrecoRelativoWPSHOP');		
									if($categories){
										
										foreach($categories as $category) {
   										 		$catID = $category->term_id;
										 
   											 	if( intval($ativarIdCatPrecoRelativo) == intval($catID)  ){                            				$precoMovel=true;
   										 			}
										}
											
										
									}
									
									if($precoMovel==true){
									?>	<div class='boxAlteraPreco'>
											
										 
												<p>
													<label for="larguraProduto">Largura (CM):</label><br/>
										
											<input type='text' id="larguraProduto" name="larguraProduto"  val='100'  class='calculaPreco'/>
										
												</p>
												
												
											
											<p><label for="alturaProduto">Altura (CM):</label><br/>
										
										<input type='text'  id="alturaProduto"   name="alturaProduto" val='100'  class='calculaPreco' />
										
											</p>
											
											
											<p>Observação:</p>
											<p><textarea id='obsProduto' name='obsProduto'></textarea>
											
											
											
										</div>
										
										<div class='clear'></div>
										<?php };?>