#!/usr/bin/env sh

# abort on errors
set -e

# build
vendor/bin/phpdoc -d ./src -t ./docs/api
php bin/docs.php src/ docs/Operations.md

# navigate into the build output directory
cd ./docs/api

# if you are deploying to a custom domain
#echo 'www.coronavirus-rd.com' > CNAME

git init
git add -A
git commit -m 'deploy'

# if you are deploying to https://<USERNAME>.github.io
#git push -f git@github.com:<USERNAME>.github.io.git master

# if you are deploying to git
git push -f git@github.com:masterfermin02/slash.git master:gh-pages

cd -
