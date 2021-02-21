.PHONY: sniff test vendor

validate:
	pear package-validate

package:
	pear package

update:
	php composer update --dev

vendor:
	composer install --no-interaction --prefer-source --dev

test:
	vendor/bin/phpunit

doc: 
	php bin/docs.php src/ docs/Operations.md
