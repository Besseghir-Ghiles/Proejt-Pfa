!/bin/bash

helm repo add longhorn https://charts.longhorn.io

helm repo update

kubectl create namespace longhorn-system

helm install longhorn longhorn/longhorn --namespace longhorn-system

kubectl -n longhorn-system get pods

kubectl apply -f - <<EOF
apiVersion: storage.k8s.io/v1
kind: StorageClass
metadata:
  name: longhorn
provisioner: driver.longhorn.io
EOF

echo "Longhorn installation and configuration completed."
