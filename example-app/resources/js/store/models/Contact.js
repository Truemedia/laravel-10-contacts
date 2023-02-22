import { Model } from 'pinia-orm'

// Contact Model
export default class Contact extends Model {
  static entity = 'contacts'
  static fields () {
    return {
      id: this.uid(),
      firstName: this.string(''),
      lastName: this.string(''),
      email: this.string(''),
      telephone: this.string('')
    }
  }
}
