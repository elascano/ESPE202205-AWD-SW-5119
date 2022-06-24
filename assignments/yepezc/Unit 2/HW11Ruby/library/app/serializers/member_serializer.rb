class MemberSerializer < ActiveModel::Serializer
  attributes :id, :name
  belongs_to :band #solo los que tengan asignado ><'
end
