SHELL = /bin/bash 
VERSION = 0.16.22
OWNER = www-data
GROUP = www-data
DST_DIR = assets

install-assets:
	mkdir -p $(DST_DIR)
	curl -L https://github.com/KaTeX/KaTeX/releases/download/v$(VERSION)/katex.tar.gz | tar -xz -C $(DST_DIR) --strip-components=1
	find $(DST_DIR) -type d | xargs chmod 750 && find $(DST_DIR) -type f | xargs chmod 640 && chown -R $(OWNER):$(GROUP) $(DST_DIR)

uninstall-assets:
	rm -fr $(DST_DIR)