#!/bin/bash

mkdir -p $PWD/.docker/{logs,tmp}

docker run --rm -it \
  --name cupcake-app \
  -v $PWD/.docker/logs:/app/logs \
  -v $PWD/.docker/tmp:/app/tmp \
  -p 9090:80 \
  -e DEBUG=1 \
  cupcake-app