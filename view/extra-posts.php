            <div class="extra-post-wrapper">
                <?php
                    foreach($all_news as $news){
                        $news['image'] = @in_array(@end(@explode('/', $news['image'])), $noImage) ? $news['image'] : 'https://cdn.ulak.news/'.@end(@explode('/', $news['image']));
                ?>
                    <div class="columns column-2">
                        <article class="extra-post-box" style="min-height: 130px; max-height: 130px;">
                            <a title="<?php echo $news['title']; ?>" href="/<?php echo $news['seo_link']; ?>" class="extra-post-link">
                                <div class="post-image">
                                    <span><img alt="<?php echo $news['title']; ?>" src="<?php echo $news['image']; ?>?w=120&h=120" width="80" height="80"></span>
                                </div>
                                <div class="post-title">
                                    <?php echo $news['title']; ?>
                                    <span class="post-date"><?php echo $ulak_class->time_since($news['date_u']); ?> yayınlandı</span>
                                </div>
                            </a>
                        </article>
                    </div>
                <?php
                    }
                    unset($news);
                ?>
			</div>