<?php 
    /**
     * Viewing the awards page.
     *
     * Included by index.php no specific site is to be viewed.
     */
    if(is_file($awardsFile)) {
        $awards = unserialize(file_get_contents($awardsFile));
    } else {
        $awards = [];
    }
?>
<div id="header">Awards</div>
<div id="awards">
    <?php 
        sortStatsByAwardName();
        foreach($stats as $id => $stat) {
            ?>
                <div class="award-box">
                    <div class="award-icon">
                        <img src="<?php  echo(getStatIcon($stat)); ?>"/>
                    </div>
                    <div class="award-title">
                        <a href="?stat=<?php  echo($id); ?>"><?php  echo($stat['award']); ?></a>
                    </div>
                    
                    <?php 
                        if(array_key_exists($id, $awards)) {
                            $awardWinner = createPlayerWidget($awards[$id]['id'], 24);
                            $awardText = $stat['desc'] . ': <span class="award-score">' . getStatDisplayValue($stat, $awards[$id]['score']) . '</span>';
                        } else {
                            $awardWinner = createPlayerWidget(FALSE, 24);
                            $awardText = '(' . $stat['desc'] . ')';
                        }
                    ?>
                    
                    <div class="award-winner-box">
                        <div class="award-winner">
                            <?php  echo($awardWinner); ?>
                        </div>
                        <div class="award-text">
                            <?php  echo($awardText); ?></span>
                        </div>
                    </div>
                </div>
            <?php 
        }
    ?>
</div>