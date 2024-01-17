## apicept
api codeception test package

## For version push use below commands
- git tag v1.0.0
- git push origin v1.0.0

## Version : 1.0.0
Description : Create Sample test package with sample test api files.

## Version : 1.0.11
Description : Add final script and test all the scenarios of apis.

## Version : 1.0.12
Description : Add final script and test all the scenarios of apis.

## Introduction 
api codeception test package

## Instructions

First, install this package:

    composer require esharsh/testcept

Next, move the files from vendor folder to root folder using below script

    cp -r ./vendor/esharsh/testcept/src/tests ./tests

Hit below command to run the api test

    ./vendor/bin/codecept run -v
