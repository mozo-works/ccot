# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "mozodev/bionic64-anyenv"
  config.vm.network "forwarded_port", guest: 4000, host: 4000
  config.vm.provider "virtualbox" do |vb|
    vb.name = "ccot"
    vb.cpus = 2
    vb.memory = "1024"
    vb.linked_clone = true
  end
  config.vm.provision "shell", inline: <<-SHELL
    apt-get update && apt-get -y -qq upgrade
  SHELL
  config.vm.provision "shell", privileged: false, inline: <<-SHELL
    rbenv install 2.7.1 && rbenv global 2.7.1 && rbenv uninstall -f 2.5.8
    cd /vagrant/ && gem install bundler && rm Gemfile.lock && bundle update
    curl https://rclone.org/install.sh | sudo bash
    mkdir -p /vagrant/_drive
    # rclone config
    # rclone mount visualtheater:/ /vagrant/_drive --daemon
  SHELL
end
