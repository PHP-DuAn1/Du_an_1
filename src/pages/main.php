<!-- 
<div class="content">
        <div class="column" id="column1">
            <div class="news-item">
            <h2><a href="link1.html">Tiêu đề tin 1111</a></h2>
                <p>Mô tả tin 1.</p>
            </div>
            <div class="news-item">
            <h2><a href="link2.html">Tiêu đề tin 2</a></h2>
                <p>Mô tả tin 2.</p>
            </div>
            <div class="news-item">
            <h2><a href="link3.html">Tiêu đề tin 3</a></h2>
                <p>Mô tả tin 3.</p>
            </div>
        </div>
        <div class="column" id="column2">
            <div class="news-item">
            <h2><a href="link4.html">Tiêu đề tin 4</a></h2>
                <p>Mô tả tin 4.</p>
            </div>
            <div class="news-item">
            <h2><a href="link5.html">Tiêu đề tin 5</a></h2>
                <p>Mô tả tin 5.</p>
            </div>
            <div class="news-item">
            <h2><a href="link6.html">Tiêu đề tin 6</a></h2>
                <p>Mô tả tin 6.</p>
            </div>
        </div>
        <div class="column" id="column3">
            <div class="news-item">
            <h2><a href="link7.html">Tiêu đề tin 7</a></h2>
                <p>Mô tả tin 7.</p>
            </div>
            <div class="news-item">
            <h2><a href="link8.html">Tiêu đề tin 8</a></h2>
                <p>Mô tả tin 8.</p>
            </div>
            <div class="news-item">
            <h2><a href="link9.html">Tiêu đề tin 9</a></h2>
                <p>Mô tả tin 9.</p>
            </div>
        </div>
        
      
    </div>
    </div>
</main> -->
<div class="content">
        <div class="column" id="column1">
            <?php foreach ($news as $index => $item) { ?>
                <?php if ($index % 3 == 0) { ?>
                    <div class="news-item">
                        <h2><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></h2>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="column" id="column2">
            <?php foreach ($news as $index => $item) { ?>
                <?php if ($index % 3 == 1) { ?>
                    <div class="news-item">
                        <h2><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></h2>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="column" id="column3">
            <?php foreach ($news as $index => $item) { ?>
                <?php if ($index % 3 == 2) { ?>
                    <div class="news-item">
                        <h2><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></h2>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>