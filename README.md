# Installing instructions

## Local setup

Create the reverse-proxy network (if not already done)
```bash
docker network create reverse-proxy
```

Create the reverse-proxy with traefik (if you don't have traefik)
```bash
fig -f docker-compose.traefik.yml up -d
```

Run the application
```bash
fig up -d web
```

### Console

```bash
fig run console
```

### Tools
#### Composer

```bash
fig run composer
```

#### MailHog

Access development mail boxes

```bash
fig up -d mailserver
```

http://mail.127.0.0.1.nip.io/


#### Adminer

Adminer is database management tool.

```bash
fig up -d adminer
```

http://adminer.127.0.0.1.nip.io
