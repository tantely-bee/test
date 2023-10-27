pipeline{
    agent any
    environment{
        PROJECT_ID = 'white-berm-402808'
        CLUSTER_NAME = 'cluster'
        LOCATION = 'us-central1-c'
        CREDENTIALS_ID = 'ed421869-ce00-4690-9a67-0c654afe7761'
    }

    stages{
        stage('Git checkout'){
            steps{
                checkout scm
            }
        }

        stage('Building image'){
            steps{
                script{
                    webapp = docker.build("ranjarat/webtest:0.${env.BUILD_ID}")
                }
            }
        }

        stage('Pushing image'){
            steps{
                script{
                    docker.withRegistry('https://registry.hub.docker.com', 'hub'){
                        webapp.push("latest")
                        webapp.push("0.${env.BUILD_ID}")
                    }
                }
            }
        }

         stage('Deploy to GKE'){
            steps{
                sh "sed -i 's/webtest:latest/webtest:0.${env.BUILD_ID}/g' deployment.yaml"
                step([$class: 'KubernetesEngineBuilder', projectId: env.PROJECT_ID, clusterName: env.CLUSTER_NAME, location: env.LOCATION, manifestPattern: 'deployment.yaml', credentialsId: env.CREDENTIALS_ID, verifyDeployments: true])
                sh 'gcloud auth login --quiet --cred-file=/home/tsirynantenaina18/auth.json'
                sh 'gcloud container clusters get-credentials autopilot-cluster --zone northamerica-northeast1-a --project white-berm-402808'
                sh 'kubectl set image deployment webapp webapp=ranjarat/webtest:latest'
            }
        }
    }
}
