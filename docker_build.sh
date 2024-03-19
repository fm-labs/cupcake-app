#!/bin/bash

docker build \
  --build-arg PHP_VERSION=8.2 \
  -t cupcake-app \
  -f Dockerfile .