#!/bin/bash

echo "# direccion-cloud" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M master
git remote add origin https://github.com/aumaza/direccion-cloud.git
git push -u origin master
                