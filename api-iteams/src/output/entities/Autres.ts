import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity("autres", { schema: "ITEAMS" })
export class Autres {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "nom", length: 255 })
  nom: string;

  @Column("text", { name: "lien" })
  lien: string;

  @Column("int", { name: "id_membre" })
  idMembre: number;
}
