<?php get_header('home'); ?>


<?php

$components = carbon_get_the_post_meta( 'components' );

foreach($components as $comp) {
    get_template_part('parts/' . $comp['_type'] . '/part', null, $comp);
}

?>





<script>
    var tabVideos = document.querySelectorAll('.tabs-videos');
    var videoAnimActive = false;

    for (let index = 0; index < tabVideos.length; index++) {
        const element = tabVideos[index];
        var tabs = element.querySelectorAll('.tabs-videos__tab');
        
        for (let index = 0; index < tabs.length; index++) {
            const tab = tabs[index];
            tab.addEventListener('click', function(event) {
                event.stopPropagation();

                if (videoAnimActive == true) {
                    return;
                }

                
                for (let index = 0; index < this.closest('.tabs').querySelectorAll('.tabs-videos__tab').length; index++) {
                    this.closest('.tabs').querySelectorAll('.tabs-videos__tab')[index].parentElement.classList.remove('active');
                }

                this.parentElement.classList.add('active');
                
                const videoIndex = Array.prototype.indexOf.call(this.parentElement.parentElement.children, this.parentElement);

                var newVideoSrc = this.getAttribute('data-videosrc');

                var video = this.closest('.container').querySelector('video');

                video.style.opacity = '0'

                video.querySelector('source').src = newVideoSrc;

                var videoAnimActive = true;


                // If you want to remove it from the page after the fadeout
                video.addEventListener('transitionend', (e) => {

                    if (videoAnimActive) {
                        video.load()

                        setTimeout(function(){
                            video.style.opacity = '1';
                            videoAnimActive = false;

                        }, 500)
                    }
                });


                for (let index = 0; index < this.closest('.container').querySelectorAll('.content-area').length; index++) {
                    const content = this.closest('.container').querySelectorAll('.content-area')[index];
                    
                    content.classList.add('dn');
                }

                this.closest('.container').querySelectorAll('.content-area')[videoIndex].classList.remove('dn');
            });
        }
        
    }
</script>

 
<?php get_footer(); ?>