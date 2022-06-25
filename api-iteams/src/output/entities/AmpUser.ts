import { Column, Entity, Index, PrimaryGeneratedColumn } from "typeorm";

@Index("user_id", ["userId"], { unique: true })
@Entity("amp_user", { schema: "ITEAMS" })
export class AmpUser {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "user_id", unique: true, length: 50 })
  userId: string;

  @Column("varchar", { name: "action", nullable: true, length: 50 })
  action: string | null;

  @Column("datetime", { name: "last_use", default: () => "CURRENT_TIMESTAMP" })
  lastUse: Date;

  @Column("varchar", { name: "lang", nullable: true, length: 5 })
  lang: string | null;

  @Column("varchar", { name: "tmp", nullable: true, length: 255 })
  tmp: string | null;
}
