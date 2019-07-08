<p>
Hvis du ønsker beregning for forskellige pladetykkelser, så laver du bare en beregning for hver pladetykkelse.
</p>
<div align="center" class="table_calculate row">
    <button id="calBtn" class="btn secondary button">Beregn forbrug</button>
</div>
<div class="section_box result hidden">
    <?php
        $cart_page_id = wc_get_page_id( 'cart' );
        $cart_page_url = $cart_page_id ? get_permalink( $cart_page_id ) : '';                
    ?>    
    <form action="<?=$cart_page_url?>" method="post">
        <input type="hidden" name="mass_shopping" value="skamo">
        <?php wp_nonce_field( 'mass_shopping_action', 'mass_shopping_action' ); ?>
        <div class="section_title">
            <h4>Resultat</h4>
            <h4 id="total_areal_print">0</h4>
        </div>
        <div class="row">
            <div class=" ast-col-sm-4">
                <label class="section_result total_a" id="total_areal">0</label>
                <div class="left_text">
                    <p>Udover de nævnte produkter kan du også få brug for følgende tilbehørsprodukter.</p>
                    <ul style="margin-top:20px;margin-left: 0;">
                        <li>
                            <div class="thumbnail-left">
                                <div class="thumbnail">
                                    <?php echo wc_get_gallery_image_html($corner->get_image_id())?>
                                </div>
                            </div>
                            <div class="thumbnail-center">
                                <strong><a href="<?=get_permalink( $corner_id )?>" target="_blank">SkamoWall Corner</a></strong>
                                <span style="padding-left:11px;display:block">Hjørnebeskytter</span>
                                </div>
                            <div class="thumbnail-right">
                                <?php 
                                    $weight = $corner->get_weight(); 
                                    $step = $weight;
                                    if($weight == null){
                                        $weight = 0;
                                        $step = 1;
                                    }
                                ?>
                                <input type="number" name="products[<?=$corner_id?>][quantity]" data-quantity='0' min="0" step="<?= $step;?>" value="<?= $weight;?>">
                                <input type="hidden" name="products[<?=$corner_id?>][id]" value="<?=$corner_id?>">
                            </div>    
                        </li>
                        <!--<li>
                            <div class="thumbnail-left">
                                <div class="thumbnail mesh">
                                    <?php echo wc_get_gallery_image_html($mesh->get_image_id())?>
                                </div>
                            </div>
                            <div class="thumbnail-center">
                                <strong>SkamoWall Mesh</strong>
                                <span style="padding-left:11px;display:block">Armeringsnet</span>
                            </div>
                            <div class="thumbnail-right">
                                <?php 
                                    $weight = $mesh->get_weight(); 
                                    $step = $weight;
                                    if($weight == null){
                                        $weight = 0;
                                        $step = 1;
                                    }
                                ?>
                                <input type="number" name="products[<?=$mesh_id?>][quantity]" data-quantity='0'  min="0" step="<?= $step;?>" value="<?= $weight;?>">
                                <input type="hidden" name="products[<?=$mesh_id?>][id]" value="<?=$mesh_id?>">
                            </div>    
                        </li>-->
                        <li>
                            <div class="thumbnail-left">
                                <div class="thumbnail wedge">
                                    <?php echo wc_get_gallery_image_html($wedge->get_image_id())?>
                                </div>
                            </div>
                            <div class="thumbnail-center">
                                <strong><a href="<?=get_permalink( $wedge_id )?>" target="_blank">SkamoWall Wedge</a></strong>
                                <span style="padding-left:11px;display:block">Kilen</span>
                            </div>
                            <div class="thumbnail-right">
                                <?php 
                                    $weight = $mesh->get_weight(); 
                                    if($weight == null){
                                        $weight = 0;
                                        $step = 1;
                                    }

                                ?>
                                <input type="number" name="products[<?=$wedge_id?>][quantity]" data-quantity='0'  min="0" step="<?= $step;?>" value="<?= $weight;?>">
                                <input type="hidden" name="products[<?=$wedge_id?>][id]" value="<?=$wedge_id?>">
                            </div>    
                        </li>
                        <li>
                            <div class="thumbnail-left">
                                <div class="thumbnail protox">
                                    <?php echo wc_get_gallery_image_html($protox->get_image_id())?>
                                </div>
                            </div>
                            <div class="thumbnail-center">
                                <strong><a href="<?=get_permalink( $protox_id )?>" target="_blank">Protox Hysan</a></strong>
                                <span style="padding-left:11px;display:block">Skimmelfjerner</span>
                            </div>
                            <div class="thumbnail-right">
                                <input type="number" min="0" step="2.5" value="0" id="protox_quantity" data-product=<?=$protox_id?>>
                                <span id="protox_dynamic_variations">
                                <?php
                                    $protox_variations = $protox->get_available_variations();
                                    foreach($protox_variations as $index=>$protox_variation){
                                        $volumn = $protox_variation['attributes']['attribute_volumn'];
                                        $volumn_number = str_replace('L','',$volumn);
                                    ?>
                                        <input type="hidden" name="products[<?=$protox_variation['variation_id']?>][id]"  value="<?=$protox_id?>">
                                        <input type="hidden" name="products[<?=$protox_variation['variation_id']?>][quantity]" data-quantity='0'  class="protox_variation_quantity" value="<?php if($volumn_number==2.5) echo 0; else echo 0;?>" data-size="<?=$volumn_number?>">
                                        <input type="hidden" name="products[<?=$protox_variation['variation_id']?>][variation_id]" value="<?=$protox_variation['variation_id']?>">
                                    <?php                            
                                    }
                                ?>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="thumbnail-left">
                                <div class="thumbnail bore">
                                    <?php echo wc_get_gallery_image_html($bore->get_image_id())?>
                                </div>
                            </div>
                            <div class="thumbnail-center">
                                <strong><a href="<?=get_permalink( $bore_id )?>" target="_blank"><?=$bore->get_name()?></a></strong>
                                <span style="padding-left:11px;display:block"></span>
                            </div>
                            <div class="thumbnail-right">
                                <?php 
                                    $weight = $mesh->get_weight(); 
                                    if($weight == null){
                                        $weight = 0;
                                        $step = 1;
                                    }

                                ?>
                                <input type="number" name="products[<?=$bore_id?>][quantity]" data-quantity='0'  min="0" step="<?= $step;?>" value="<?= $weight;?>">
                                <input type="hidden" name="products[<?=$bore_id?>][id]" value="<?=$bore_id?>">
                            </div>
                        </li>
                        <input type="hidden" name="products[<?=$pallet_id?>][quantity]" value="4" min="4">
                        <input type="hidden" name="products[<?=$pallet_id?>][id]" value="<?=$pallet_id?>">
                    </ul>
                </div>
            </div>

            <div class=" ast-col-sm-8">
                <div class="table-responsive">
                    <table class="table resultat">
                        <tbody>
                            <tr>
                                <td colspan="2">Produkt</td>
                                <td>Antal</td>
                                <td>Vægt kg</td>
                                <!--<td>SkamoWall varenr.</td>
                                <td>Byggebasens varenr.</td>-->
                            </tr>
                            <!--Plade-25-->
                            <tr id="plade_tr_25" data-id="<?php $board_id?>">
                                <td>
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($board->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $board_id )?>" target="_blank">SkamoWall Board</a>
                                <span style="font-weight:normal;display:block">Plade</span>
                                </td>
                                <!-- ::save:: <td style="font-weight:normal">Tykkelse<br /><span id="PladeThickness">25</span> mm</td>-->
                                <td style="font-weight:normal">Tykkelse<br>
                                <span>25</span> mm</td>
                                <td id="result_sp_11">&nbsp;</td>
                                <td id="result_sp_21">&nbsp;</td>
                                <!--<td id="result_sp_3">&nbsp;</td>
                                <td id="result_sp_4">&nbsp;</td>-->
                            </tr>
                            <!--Plade--->
                            <tr id="plade_tr" data-id="<?php $board_id?>">
                                <td>
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($board->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $board_id )?>" target="_blank">SkamoWall Board</a>
                                <span style="font-weight:normal;display:block">Plade</span>
                                </td>
                                <!-- ::save:: <td style="font-weight:normal">Tykkelse<br /><span id="PladeThickness">25</span> mm</td>-->
                                <td style="font-weight:normal">Tykkelse<br>
                                <span id="PladeThickness">50</span> mm</td>
                                <td id="result_sp_1">&nbsp;</td>
                                <td id="result_sp_2">&nbsp;</td>
                                <!--<td id="result_sp_3">&nbsp;</td>
                                <td id="result_sp_4">&nbsp;</td>-->
                            </tr>
                            <!--Primer 10 L-->
                            <tr class="primer2" id="result_prs_row"  data-product="<?=$primer_id?>">
                                <td id="result_prs_1r" valign="top">
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($primer->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $primer_id )?>" target="_blank">SkamoWall Primer</a>
                                    <span style="font-weight:normal;display:block">Grunder - Leveres i dunke</span>
                                </td>
                                <td style="font-weight:normal">10 L</td>
                                <td id="result_prs_2">&nbsp;</td>
                                <td id="result_prs_1">&nbsp;</td>
                                <!--<td id="result_prs_3">&nbsp;</td>
                                <td id="result_prs_4">&nbsp;</td>-->
                            </tr>
                            <!--Klæb-->
                            <tr  data-product="<?=$adhesive_id?>" id="adhesive">
                                <td colspan="2">
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($adhesive->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $adhesive_id )?>" target="_blank">SkamoWall Adhesive</a>
                                    <span style="display:block;font-weight:normal;display:block">Klæber - Leveres i 20&nbsp;kg sække.</span>
                                </td>
                                <td id="result_k_1_dk">&nbsp;</td>
                                <td id="result_k_2_dk">&nbsp;</td>
                                <!--<td id="result_k_3_dk">&nbsp;</td>
                                <td id="result_k_4_dk">&nbsp;</td>-->
                            </tr>
                            <!--Puds 2-->
                            <tr class="puds-2mm">
                                <td valign="top">
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($plaster_smooth->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $plaster_smooth_id )?>" target="_blank">SkamoWall Smooth Plaster</a>
                                    <span style="font-weight:normal;display:block">Puds - Leveres i 15&nbsp;kg sække.</span>
                                </td>
                                <td style="font-weight:normal">Puds-tykkelse<br>
                                2 mm</td>
                                <td id="result_p_2">&nbsp;</td>
                                <td id="result_p_1">&nbsp;</td>
                                <!--<td id="result_p_3">&nbsp;</td>
                                <td id="result_p_4">&nbsp;</td>-->
                            </tr>
                            <!--Puds 4-->
                            <tr class="puds-4mm">
                                <td valign="top">                                
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($plaster_smooth->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $plaster_smooth_id )?>" target="_blank">SkamoWall Smooth Plaster</a>
                                <span style="font-weight:normal;display:block">Puds - Leveres i 15&nbsp;kg sække.</span>
                                </td>
                                <td style="font-weight:normal">Puds-tykkelse<br>
                                4 mm</td>
                                <td id="result_p2_2">&nbsp;</td>
                                <td id="result_p2_1">&nbsp;</td>
                                <!--<td id="result_p2_3">&nbsp;</td>
                                <td id="result_p2_4">&nbsp;</td>-->
                            </tr>
                            <!--Structual plaster-->
                            <tr class="struc-2mm" style="display: none;">
                                <td valign="top">
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($plaster_structure->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $plaster_structure_id )?>" target="_blank">SkamoWall Structural Plaster</a>
                                    <span style="font-weight:normal;display:block">Puds - Leveres i 18&nbsp;kg sække.</span>
                                </td>
                                <td style="font-weight:normal">Puds-tykkelse<br>
                                2 mm</td>
                                <td id="result_stpl_2">&nbsp;</td>
                                <td id="result_stpl_1">&nbsp;</td>
                                <!--<td id="result_stpl_3">&nbsp;</td>
                                <td id="result_stpl_4">&nbsp;</td>-->
                            </tr>
                            <!--Puds 4-->
                            <tr class="struc-4mm">
                                <td valign="top">
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($plaster_structure->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $plaster_structure_id )?>" target="_blank">SkamoWall Structural Plaster</a>
                                <span style="font-weight:normal;display:block">Puds - Leveres i 18&nbsp;kg sække.</span>
                                </td>
                                <td style="font-weight:normal">Puds-tykkelse<br>
                                4 mm</td>
                                <td id="result_stpl2_2">&nbsp;</td>
                                <td id="result_stpl2_1">&nbsp;</td>
                                <!--<td id="result_stpl2_3">&nbsp;</td>
                                <td id="result_stpl2_4">&nbsp;</td>-->
                            </tr>
                            <tr class="mesh" style="display: none;"  data-product="<?=$mesh_id?>" id="mesh">
                                <td valign="top">
                                    <div class="thumbnail">
                                        <?php echo wc_get_gallery_image_html($mesh->get_image_id())?>
                                    </div>
                                    <a href="<?=get_permalink( $mesh_id )?>" target="_blank">SkamoWall Mesh</a>
                                </td>
                                <td style="font-weight:normal">Armeringsnet</td>
                                <td id="result_mepl_2">&nbsp;</td>
                                <td id="result_mepl_1">&nbsp;</td>
                                <!--<td id="result_stpl_3">&nbsp;</td>
                                <td id="result_stpl_4">&nbsp;</td>-->
                            </tr>
                        </tbody>
                    </table>

                    <p id="cal_date">
                        <script type="text/javascript">
                            var date = new Date();
                            document.write((date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear()).toString());
                        </script>
                        2-5-2019
                    </p>
                </div>

                <p>Ovenstående mængder er vejledende og kan bruges i forbindelse med bestilling på vores web shop DK-indeklima.dk. Det er naturligvis en forudsætning at de oplysninger, som du selv har indtastet er korrekte. DK Indeklima er ikke ansvarlig for de beregnede mængder og brug af beregneren. Har du nogle spørgsmål, så er du velkommen til at skrive og/eller ringe til Kim Karlsen på tlf. 70 50 50 51. Vedhæft gerne et screenshot af beregningen.</p>

                    <div class="dynamic_products">
                    </div>
                    <div align="center" class="table_calculate">
                        <button id="shopping_cart" type="submit" data-url="<?=$cart_page_url?>"  class="btn secondary button">Beregn pris</button>
                    </div>
            </div>
        </div>
    </form>    
</div>