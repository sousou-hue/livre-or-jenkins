FROM jenkins/jenkins:lts

USER root

# Installe Docker CLI
RUN apt-get update && \
    apt-get install -y docker.io && \
    groupadd -f docker && \
    usermod -aG docker jenkins

USER jenkins
