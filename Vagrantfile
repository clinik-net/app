# -*- mode: ruby -*-
# vi: set ft=ruby :

unless Vagrant.has_plugin?('vagrant-hostmanager')
  # Attempt to install ourself. Bail out on failure so we don't get stuck in an
  # infinite loop.
  system('vagrant plugin install vagrant-hostmanager') || exit!

  # Relaunch Vagrant so the plugin is detected. Exit with the same status code.
  exit system('vagrant', *ARGV)
end

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
DOCUMENT_ROOT="/opt/clinik/app/public"
apt-get update
apt-get install -y apache2 git curl php5-cli php5 php5-intl libapache2-mod-php5 mongodb-server mongodb-clients php5-mongo php5-curl php5-gd rabbitmq-server nodejs npm
ln -s /usr/bin/nodejs /usr/bin/node
npm -g install pm2
echo "
<VirtualHost *:80>
    ServerName clinik.local
    DocumentRoot $DOCUMENT_ROOT
    <Directory $DOCUMENT_ROOT>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
        require all granted
    </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/clinik.local.conf
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini
a2enmod rewrite
a2dissite 000-default
a2ensite clinik.local
service apache2 restart
cd /opt/clinik/app
curl -Ss https://getcomposer.org/installer | php
php composer.phar install --no-progress
echo "** [clinik] Visit http://clinik.local in your browser for to view the application **"
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'ubuntu/wily64'
  config.vm.network "private_network", ip: "192.168.12.10"
  config.vm.synced_folder '.', '/opt/clinik/app', :mount_options => ["dmode=777","fmode=777"]
  config.vm.provision 'shell', inline: @script

  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.hostmanager.ignore_private_ip = false
  config.hostmanager.include_offline = true
  config.hostmanager.aliases = %w(
    clinik.local
  )

  config.vm.provider "virtualbox" do |vb|
    vb.customize [
        "modifyvm", :id,
        "--memory", 1024,
        "--name", "clinik.local"
    ]
  end

end
