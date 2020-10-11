# docker-scene-extractor

```
---
version: "2.1"
services:
  scene-extractor:
    image: mayniki/scene-extractor
    volumes:
      - "./output:/var/www/html/dl:rw"
      - "source:/source:ro"
    ports:
      - "80:80"

volumes:
  source:
    driver_opts:
      type: "nfs"
      o: "addr=192.168.5.10,nolock,soft,ro"
      device: ":/volume1/plex-media/shows/"
```
