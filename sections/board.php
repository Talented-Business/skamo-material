<div class="section_box board">
    <div class="section_title">
        <h4>3. Vælg tykkelsen af dine SkamoWall Boards</h3>
    </div>
    <div class="row">
        <div class="ast-col-sm-4">
            <figure  style="width:178px;height:169px;">
                <?php echo wc_get_gallery_image_html($board->get_image_id())?>
                <img alt="" class="sec-img" src="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/board.png" style="width:178px;height:169px;display:none">
            </figure>
        </div>
        <div class="ast-col-sm-8">
            <?php 
                $available_variations = $board->get_available_variations();
            ?>
            <div class="table-responsive">
                <table class="table"><!--Type 1-->
                    <tbody>
                        <tr>
                            <td>Vælg</td>
                            <td>Type</td>
                            <td>Længde (mm)</td>
                            <td>Bredde (mm)</td>
                            <td>Tykkelse (mm)</td>
                        </tr>
                        <?php if(count($available_variations)>0){
                            foreach($available_variations as $index=>$variable){
                                $width = $variable['attributes']['attribute_tykkelse'];
                                $width_number = intval($width);
                                ?>
                                <tr>
                                    <td><input <?php if($width_number == 50) echo 'checked="checked"';?> id="b<?=($index+1) ?>" data-id="<?=$variable['variation_id']?>" data-product="<?=$board_id?>" name="board" type="radio" value="<?=$width_number?>"><label for="b<?=($index+1) ?>">&nbsp;</label></td>
                                    <td>1</td>
                                    <td>1000</td>
                                    <td>610</td>
                                    <td><?=$width_number?></td>
                                </tr>
                                <?php                                
                            }
                            ?>
                        <?php }else {?>    
                            <tr>
                                <td colspan=5>&nbsp;</td>
                            </tr>
                        <?php }?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
