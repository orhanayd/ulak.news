<?php 
foreach($news_data['related'] as $news){
    $news['image'] = in_array(@end(@explode('/', $news['image'])), $noImage) ? $news['image'] : 'https://cdn.ulak.news/'.@end(@explode('/', $news['image']));
?>
    <div class="columns column-2">
        <article class="post-box" style="background-image: url(<?php echo $news['image']; ?>?w=320&h=215);">
            <div class="post-overlay">
                <h3 class="post-title"><?php echo $news['title']; ?></h3>
                <div class="post-meta">
                    <div class="post-meta-author-avatar">
                        <img alt="<?php echo $news['agency_title']; ?>" class="ulak-lazy-load-image" src="./img/gifs/spinner_s.gif" data-src="./img/web/mini/<?php echo $news['agency']; ?>.jpg" class="avatar" height="24" width="24">
                    </div>
                    <div class="post-meta-author-info">
                        <span class="post-meta-author-name">
                            <a href="/kaynak_<?php echo $news['agency']; ?>.html" title="<?php echo $news['agency_title']; ?>" rel="author"><?php echo $news['agency_title']; ?></a>
                        </span>
                        <span class="middot">·</span>
                        <span class="post-meta-date">
                            <abbr class="published updated" title="<?php echo $news['date']; ?>"><?php echo $news['date']; ?></abbr>
                        </span>
                    </div>
                </div>
            </div>
            <a title="<?php echo $news['title']; ?>" href="<?php echo $news['seo_link']; ?>" class="post-overlayLink"></a>
        </article>
    </div>
<?php
}
unset($news);
?>