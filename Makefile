pull:
	rsync -avz \
	--exclude=.env \
	--exclude=public/wp-config.php \
	--exclude=public/wp-content/uploads \
	--exclude=public/wp-content/cache \
	serverpilot@blog.jgrossi.com:/srv/users/serverpilot/apps/blog/ ./

push:
	rsync -avz \
	--exclude=.git \
	--exclude=.env \
	--exclude=.DS_Store \
	--exclude=vendor \
	--exclude=public/wp-config.php \
	--exclude=public/wp-content/uploads \
	--exclude=public/wp-content/cache \
	./ serverpilot@blog.jgrossi.com:/srv/users/serverpilot/apps/blog/