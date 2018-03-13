deploy:
	composer install && \
	rsync -avz \
	--exclude=.git \
	--exclude=.env \
	--exclude=.DS_Store \
	--exclude=public/wp-content/uploads \
	--exclude=public/wp-content/cache \
	./ serverpilot@blog.jgrossi.com:apps/blog/
