
<h2><?php  echo __('News'); ?></h2>
	<dl>


		<dd>
			<h3><?php echo h($news['News']['title']); ?></h3>
		</dd>

		<dd>
			<h4><?php echo h($news['News']['date']); ?></h4>
		</dd>

		<dd>
			<p><?php echo $news['News']['body'] ?></p>
		</dd>
	</dl>
</div>

