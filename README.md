# kanboard-plugin-katex

Kanboard plugin to display formulas with katex code.

Thanks to katex project:

- https://github.com/KaTeX/KaTeX

## installation on debian

precisions:

- tested on debian 13
- bash shell is used
- root permissions is assumed

apt requirements:

```
apt install -y curl make
```

declare plugin version, ex:

```
export PLUGIN_KATEX_VERSION=0.16.22-1
```

declare kanboard installation directory, ex:

```
export PLUGIN_KATEX_DIRECTORY=/usr/local/kanboard/current/plugins/Katex
```

create directory if needed:

```
[[ -d ${PLUGIN_KATEX_DIRECTORY} ]] || install --owner=www-data --group=www-data --mode=750 --directory ${PLUGIN_KATEX_DIRECTORY}
```

download plugin:

```
curl -L https://github.com/mduret/kanboard-plugin-katex/archive/refs/tags/v${PLUGIN_KATEX_VERSION}.tar.gz | \
tar -xz -C ${PLUGIN_KATEX_DIRECTORY} --strip-components=1
```

change dir:

```
cd ${PLUGIN_KATEX_DIRECTORY}
```

install katex assets:

```
make install-assets
```

## usage

in task comments, you can use katex code, ex:

    ```katex
    x={\frac {-b\pm {\sqrt {b^{2}-4ac}}}{2a}}
    ```