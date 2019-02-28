<?php
/**
 * The template for Slider
 *
 * @package Edit
 */
?>

<?php 

$data = detectSorceIp();
$pais = $data->countryName;

if($pais == 'Portugal'){
    
    $arguments = array(
        'offset'           => '',
        'showposts'        => '-1',
        'order'            => 'DESC',
        'orderby'          => 'meta_value',
        'meta_key'        => 'pais',
        'post_type'        => 'slider',
        'suppress_filters' => '0'
    );

}else if($pais == 'Brasil'){
    
    $arguments = array(
        'offset'           => '',
        'showposts'        => '-1',
        'order'            => 'ASC',
        'orderby'          => 'meta_value',
        'meta_key'        => 'pais',
        'post_type'        => 'slider',
        'suppress_filters' => '0'
    );
    
}else{
    $arguments = array(
        'offset'           => '',
        'showposts'        => '-1',
        'order'            => 'ASC',
        'orderby'          => 'menu_order',
        'post_type'        => 'slider',
        'suppress_filters' => '0'
    );
}

//echo $data->regionName;
//Lisboa
//Porto

//countryName
//Portugal
//Brasil

$slider = get_posts( $arguments );

?>

<?php 
if($slider):
    $firstSlider = true;
    ?>

    <!-- SLIDER MODULE -->
    <div class="slider main flex full">
        <div class="wrapper">
            <section class="pane-scroll">

                <?php 
                
                foreach($slider as $post):
                    setup_postdata($post);
                    $imagemOBJ = get_field('imagem_desktop');
                    
                    ?>
                    <?php if (get_the_ID() == '19571') { ?>
                    <article class="slider-item event">
                        <div class="delayed">
                            <div class="background">
                                <div class="img" draggable="false" style="background-image:url('<?php echo $imagemOBJ; ?>')"></div>
                                <div class="img-overlay"></div>
                            </div>
                        </div>
                        <div class="slider-media">
                        </div>
                        <div class="grid-cont">
                            <div class="slider-description">
                                <?php if(get_field('dia')):?>
                                    <div class="square">
                                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        width="180px" height="180px" viewBox="0 0 180 180" enable-background="new 0 0 180 180" xml:space="preserve">
                                        <g>
                                            <rect fill="transparent" width="180" height="180" stroke="#FFFFFF" stroke-width="4">
                                            </g>
                                        </svg>
                                        <?php if(get_field('dia')):?>
                                            <p class="day"><?php the_field('dia'); ?></p>
                                        <?php endif; ?>
                                        <?php if(get_field('mes')):?>
                                            <p class="month"><?php the_field('mes'); ?> </p>

                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>

                                <a href="/<?php the_field('link'); ?>" onClick="ga('send', 'event', 'click_home2', 'link_workshop', 'Link Workshop');" class="summary">

                                    <h2>
                                        <?php if(get_field('titulo')):?>
                                            <b><?php the_field('titulo'); ?></b>
                                        <?php endif; ?>
                                        
                                    </h2>
                                    <br>
                                    <?php if(get_field('description')):?>
                                        <p><?php the_field('description'); ?></p>
                                    <?php endif; ?>
                                    
                                </a>

                                <?php if(get_field('label')): ?>

                                    <div class="icon-cont">
                                        <div class="icon">
                                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                            <path fill="#FFDD15" d="M0,0v50h50V0H0z M47.801,23.641H30.309V2.198h17.492V23.641z M28.11,2.198v21.443H2.199V2.198H28.11z
                                            M2.199,25.839h8.567v21.963H2.199V25.839z M12.965,47.803V25.839h34.836v21.963H12.965z" />
                                        </svg>
                                    </div>
                                    <span class="icon-label"><?php the_field('label'); ?></span>
                                </div>
                            <?php endif; ?>         
                        </div>
                        
                    </div>
                </article>
                <?php 
            }
            $firstSlider = false;
        endforeach;
        ?>




    </section>
</div>
<div class="slider-controls">
    <div class="controls">
        <div class="next-btn">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
            <g>
                <g>
                    <path fill="#FFFFFF" d="M5.75,0c0.128,0,0.256,0.049,0.354,0.146l10.5,10.5c0.094,0.094,0.146,0.221,0.146,0.354
                    s-0.053,0.26-0.146,0.354l-10.5,10.5c-0.195,0.195-0.512,0.195-0.707,0s-0.195-0.512,0-0.707L15.543,11L5.396,0.854
                    c-0.195-0.195-0.195-0.512,0-0.707C5.494,0.049,5.622,0,5.75,0z" />
                </g>
            </g>
        </svg>
    </div>
    <div class="separator"></div>
    <div class="prev-btn">
        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
        <g>
            <g>
                <path fill="#FFFFFF" d="M16.249,22.001c-0.128,0-0.256-0.049-0.354-0.146l-10.5-10.5c-0.094-0.094-0.146-0.221-0.146-0.354
                s0.053-0.26,0.146-0.354l10.5-10.5c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707L6.456,11.001l10.146,10.146
                c0.195,0.195,0.195,0.512,0,0.707C16.505,21.952,16.377,22.001,16.249,22.001z" />
            </g>
        </g>
    </svg>
</div>
</div>
<div class="indicator">
    <div class="strip-display">
        <div class="strip" style="transform: matrix(1,0,0,1,0,0)">
            <?php for ($i = 1; $i <= count($slider); $i++): ?>
                <p><?php echo $i; ?></p>
            <?php endfor; ?>

        </div>
    </div>
    <div class="separator">/</div>
    <span class="total"><?php echo count($slider); ?></span>
</div>
</div>
<div class="slider-interface">
    <div class="grid-cont">
        <a href="/formacao/?inputCursos=54" class="slider-interface-item curso">
            <div class="image">
                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                <path fill="#FFDD15" d="M0,0v50h50V0H0z M47.801,23.641H30.309V2.198h17.492V23.641z M28.11,2.198v21.443H2.199V2.198H28.11z
                M2.199,25.839h8.567v21.963H2.199V25.839z M12.965,47.803V25.839h34.836v21.963H12.965z"/>
            </svg>

        </div>
        <div class="text">
            <h3>Cursos</h3>
        </div>
    </a>
    <a href="/formacao/?inputCursos=58" class="slider-interface-item intensivo">
        <div class="image">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
            <path fill="#E98375" d="M0,0v50h50V0H0z M48,36H38V2h10V36z M36,24H26V2h10V24z M24,24H2V14h22V24z M12,26v10H2V26H12z M14,26h10v10
            H14V26z M36,38v10H14V38H36z M26,36l0.1-10.161L36,26v10H26z M24,2v10H2V2H24z M2,38h10v10H2V38z M38,48V38h10v10H38z"/>
        </svg>
    </div>
    <div class="text">
        <h3>Cursos Intensivos</h3>
    </div>
</a>
<a href="/formacao/?inputCursos=60" class="slider-interface-item workshops">
    <div class="image">
        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
        <path fill="#66C4B3" d="M0,0v50h50V0H0z M48,24H26V2h22V24z M24,2v22H2V2H24z M2,26h22v22H2V26z M26,48V26h22v22H26z"/>
    </svg>

</div>
<div class="text">
    <h3>Workshops</h3>
</div>
</a>
</div>
</div>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({ type: 'homeSlider', instance: new Edit.modules.homeSlider('.main') });
    })
</script>
<!-- END SLIDER MODULE -->

<?php 
endif;
?>
