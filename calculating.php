<style>
.section_title{
    background-image: linear-gradient(150deg, #83e72c 0%, #59c925 100%);
    float: left;
    width: 100%;
    padding: 10px 10px;    
    margin-bottom: 20px;
}
.section_title > h4 {
    color: #fff;
    font-weight:bolder;
    margin-bottom: 0;
}
.bg_none {
    background-color: #fff !important;
}
#wrapper table{
    border-width:0;
}
#wrapper table td {
    background-color: #d5d8da;
    font-weight: 700;
    padding:5px;
    vertical-align: top;
}
#wrapper table td[align="right"] {
    text-align:right;
}
#wrapper table td[align="center"] {
    text-align:center;
}

#wrapper .wall table td,#wrapper .window table td,#wrapper .door table td {
    border: 5px solid #fff;
}
#wrapper .board table tr td, #wrapper .result table tr td {
    border: 2px solid #fff;
}
#wrapper table td input:focus{
    outline:none;
}
#wrapper table td:first-child{
    width:50%;
    padding-left:10px;
}
#wrapper table td:nth-child(2),#wrapper table td:nth-child(3){
    width:25%;
}
#wrapper table tr td:first-child{
	padding-left:10px !important;
  /*padding-top: 10px !important;*/
}
#wrapper .wall table tr:not(:first-child) td:first-child{
    padding-top: 10px !important;
}
#wrapper table td input[type=text]{
    border:none;
    background-color:inherit;
    padding:0px;
    font-weight: 700;
    width:100%;
    text-align: center;
}
#window_deep,#door_deep{
    border: 3px solid #59c925;
    padding: 4px 8px;
    margin-right: 28px;
}
#wrapper .result table tr td:not(:first-child){
    text-align: center;
}
#wrapper .result table .puds-4mm td:nth-child(2){
    text-align: left !important;
}
.section_result {
    border: 3px solid #59c925;
    background-color: #fff;
    padding: 10px;
    float: left;
    display: block;
    width: 100%;
    text-align: center;
}
.wall .ast-col-sm-4 > figure {
    margin-top: 40px;
}
.window .ast-col-sm-4 > figure, .door .ast-col-sm-4 > figure {
    margin-top: 20px;
}
tr#plade_tr:nth-child(2) td:nth-child(2) {
    border-left: none !important;
}
tr#plade_tr:nth-child(2) td:nth-child(1) {
    border-right: none !important;
}
tr#plade_tr_25 td:first-child,tr#plade_tr td:first-child {
    border-right: 0!important;
}
tr#plade_tr_25 td:nth-child(2),tr#plade_tr td:nth-child(2) {
    border-left: 0!important;
}
#wrapper .result table .primer1 td:nth-child(2), #wrapper .result table .primer2 td:nth-child(2), #wrapper .result table .primer3 td:nth-child(2) {
    border-left: 0;
}
#wrapper .result table .primer1 td:first-child,#wrapper .result table .mesh td:first-child {
    border-right: 0;
}
#wrapper .result table .puds-2mm td:nth-child(2),#wrapper .result table .mesh td:nth-child(2) {
    border-left: 0;
}
#wrapper .result table .puds-2mm td:first-child {
    border-right: 0;
}
#wrapper .result table tr.struc-2mm td:first-child,
#wrapper .result table tr.struc-4mm td:first-child{
	border-right:none;
}
#wrapper .result table tr.struc-2mm td:nth-child(2),
#wrapper .result table tr.struc-4mm td:nth-child(2){
	border-left:none;
}
/*.struc-2mm, .struc-4mm{
	display:none;
}*/
.struc-4mm{
	display:none;
}
#result_pr3_row{
	display:none
}

/*#wrapper .result table tr:nth-child(5) td:first-child{
    border-right: 0;
}*/
#wrapper .result table .primer1 td:first-child{
    border-right:0;
}
#wrapper .result table .primer2 td:first-child{
    border-right:0;
}
#wrapper .result table .primer3 td:first-child{
    border-right:0;
    border-top:0;
}


#wrapper .result table .puds-2mm td:first-child{
    border-right: 0;
}

/*#wrapper .result table tr:nth-child(5) td:nth-child(2),
#wrapper .result table tr:nth-child(6) td:nth-child(1){
    border-left: 0;
}*/

#wrapper .result table .primer1 td:nth-child(2),
#wrapper .result table .primer2 td:nth-child(2),
#wrapper .result table .primer3 td:nth-child(2){
    border-left:0;
}
#wrapper .result table .puds-2mm td:nth-child(2){
    border-left: 0;
}
#wrapper .result table .puds-4mm td:nth-child(1){
	border-left: 2px solid #FFF!important;
}
#wrapper .result table tr.puds-4mm td:first-child {
    border-right: none;
}
#wrapper .result table tr.puds-4mm td:nth-child(2) {
    border-left: none;
}
#wrapper .result table tr.protox-hysan td:first-child {
    border-right: none;
}
#wrapper .result table tr.protox-hysan td:nth-child(2) {
    border-left: none;
}
tr.protox-hysan-5{display:none}
.puds-2mm{
display:none;
}
.ast-col-sm-4 > figure {
    margin-left: 25px;
}
.section_select{
    background-color:#d5d8da;
    width:100%;
    float:left;
    padding:10px;
    margin-top:10px;
    position: relative;
}
.table_calculate {
    width: 100%;
    float: left;
    margin-top: 40px;
    margin-bottom: 40px;
}
figcaption {
    margin-top: 15px;
}
.section_box {
    width: 100%;
    margin-top: 20px;
    float: left;
}
#total_areal_print {
    display: none;
}
.result .section_result::after {
    content: "m²";
    float: right;
    font-weight: 700;
    font-size: 32px;
}
.section_result.total_a {
    font-size: 32px;
    font-weight: 700;
}
.left_text {
    width: 100%;
    float: left;
    margin-top: 20px;
}
.result ul {
    list-style-type: none;
    list-style-position: inside;
}
.table-responsive{
    min-height: .01%;
    overflow-x: auto;    
}
@media screen and (max-width: 767px){
.table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #ddd;
}
}
.above{
    z-index:10;
}
p#cal_date {
    display: none;
}
.resultat tbody tr td:nth-child(3) {
    display: none!important;
}
td .thumbnail{
    float:left;
    padding-right: 5px;
}
.thumbnail{
    width: 50px;
    display: block;
}
.mesh, .mesh img{
    width:6px;
    margin-left: 18px;
    margin-right:auto;
}
.wedge{
    width:12px;
    margin-left:auto;
    margin-right:auto;
}
.bore{
    width:22px;
    margin-left:auto;
    margin-right:auto;
}

.thumbnail-left{
    width:55px;
    float:left;
}
[type="radio"]:not(:checked),
[type="radio"]:checked {
    position: absolute;
    left: -9999px;
}
[type="radio"]:not(:checked) + label,
[type="radio"]:checked + label {
    position: relative;
    padding-left: 25px;
    cursor: pointer;
}

/* checkbox aspect */
[type="radio"]:not(:checked) + label:before,
[type="radio"]:checked + label:before {
    content: '';
    position: absolute;
    left: 1px;
    top: 3px;
    width: 17px; height: 17px;
    border: 1px solid #aaa;
    background: #59c925;
    border-radius: 3px;
    box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
}




/* checked mark aspect */
[type="radio"]:not(:checked) + label:after,
[type="radio"]:checked + label:after {
    content: '✔';
    position: absolute;
    top: 0;
    left: 4px;
    font-size: 14px;
    color: #ffffff;
    line-height: 1.75;
    -webkit-transition: all .2s;
    -moz-transition: all .2s;
    -ms-transition: all .2s;
    transition: all .2s;
}
/* checked mark aspect changes */
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
}
/* disabled checkbox */
[type="radio"]:disabled:not(:checked) + label:before,
[type="radio"]:disabled:checked + label:before {
    box-shadow: none;
    border-color: #bbb;
    background-color: #ddd;
}
[type="radio"]:disabled:checked + label:after {
    color: #999;
}
[type="radio"]:disabled + label {
    color: #aaa;
}
/* accessibility */
[type="radio"]:checked:focus + label:before,
[type="radio"]:not(:checked):focus + label:before {
    border: 1px solid #59c925;
}
input[type=number]{
    border-width: 0px;
}
.thumbnail-center{
    width: 160px;
    float:left;
}
.thumbnail-right{
    width: 50px;
    float:right;
}
.thumbnail-right input{
    border: 1px solid #59c925;
    width:70px;
    margin-top: 3px;
}
.left_text ul li{
    clear:right;
    width:268px;
}
@media screen and (max-width: 991px) and (min-width: 544px){
    .thumbnail-right{
        width: 50px;
        float:none;
        margin-left: 100px;
    }
}
.videoWrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    padding-top: 25px;
    float:left;
    width:100%;
}
.videoWrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.ast-separate-container #primary{
    margin-top:0;
}
#add_wall button,#add_door button,#add_window button{width:200px;}
</style>
<div id="wrapper" class="woocommerce">
    <?php 
        $wc_factory = new WC_Product_Factory(); 
        extract(SkamoWall::$skamowall_product_ids);
        foreach(SkamoWall::$skamowall_product_ids as $key => $product_id) {
            $variable_name = substr($key,0,-3);
            $$variable_name = $wc_factory->get_product($product_id);
        }        
    ?>
    <p>Beregn dit materialeforbrug, når du skal sætter Skamowall op. Se evt vejledningen nederst og/eller ring for vejledning. Vi har prisgaranti.</p>
    <?php include_once 'sections/wall.php';?>
    <?php include_once 'sections/door-windows.php';?>
    <?php include_once 'sections/board.php';?>
    <?php include_once 'sections/plaster.php';?>
    <?php include_once 'sections/calculator.php';?>
    <?php include_once 'calculating.js.php';?>
    <div class="videoWrapper">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/9Gl_QdMSubo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
