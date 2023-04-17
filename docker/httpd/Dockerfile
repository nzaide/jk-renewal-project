FROM httpd:2.4.48

RUN sed -i \
        -e 's/^#\(Include .*httpd-vhosts.conf\)/\1/' \
        conf/httpd.conf

WORKDIR /usr/local/apache2/htdocs