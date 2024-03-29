#!/bin/sh

cd ~phoebius/git/phoebius.git
git tag | while read tag;do if [ ! -f "~phoebius/phoebius.org/www/src/phoebius-${tag}.tar.gz" ]; then git archive --prefix=phoebius-$tag/ $tag^{tree} | gzip > ~phoebius/phoebius.org/www/src/phoebius-$tag.tar.gz;fi; done

git archive --prefix=phoebius-latest/ HEAD^{tree} | gzip > ~phoebius/phoebius.org/www/src/phoebius-latest.tar.gz

cd ~phoebius/git/phoebius-app.git
git archive --prefix=phoebius-app/ HEAD^{tree} | gzip > ~phoebius/phoebius.org/www/src/phoebius-app-latest.tar.gz

cd ~phoebius/git/phoebius-site.git
git archive --prefix=phoebius-site/ HEAD^{tree} | gzip > ~phoebius/phoebius.org/www/src/phoebius-site-latest.tar.gz

cd ~phoebius/git/phoebius-ajax-example.git
git archive --prefix=phoebius-ajax-example/ HEAD^{tree} | gzip > ~phoebius/phoebius.org/www/src/phoebius-ajax-example-latest.tar.gz
